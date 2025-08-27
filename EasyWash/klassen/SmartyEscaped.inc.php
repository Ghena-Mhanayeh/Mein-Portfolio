<?php
class SmartyEscaped extends Smarty
{
    /**
     * Null-safe Escaping:
     * - akzeptiert null, Strings, Zahlen, Booleans
     * - nutzt htmlspecialchars (sicherer/übliches Escaping für HTML-Text)
     * - UTF-8 + ENT_SUBSTITUTE, verhindert Warnungen bei kaputtem UTF-8
     * - double_encode=false, damit bereits encodete Entities nicht doppelt werden
     */
    private function escapeValue($v) {
        if ($v === null) {
            return '';
        }
        if (is_string($v) || is_numeric($v)) {
            return htmlspecialchars((string)$v, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8', false);
        }
        if (is_bool($v)) {
            return $v ? '1' : '0';
        }
        // Andere Typen (Objekte/Arrays werden außerhalb behandelt)
        return $v;
    }

    public function assign($templateVar, $value = null, $toEscape = true, $nocache = false)
    {
        if ($toEscape) {
            if (is_array($value)) {
                array_walk_recursive(
                    $value,
                    function (&$item) {
                        if ($item === null) { $item = ''; return; }
                        if (is_scalar($item)) {
                            $item = htmlspecialchars((string)$item, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8', false);
                        }
                        // Nicht-skalare Items lassen wir unverändert (oder gezielt behandeln)
                    }
                );
            } else {
                $value = $this->escapeValue($value);
            }
        }

        // Signatur von Smarty::assign ist (string $tpl_var, mixed $value = null, bool $nocache = false)
        return parent::assign($templateVar, $value, $nocache);
    }
}
