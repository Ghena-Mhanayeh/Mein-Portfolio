# EasyWash — Webanwendung für Reinigungs-Service

**Kurz:** EasyWash ist eine PHP-Webanwendung (Smarty, TCPDF, MySQL) zur Verwaltung einer Wäscherei / eines Reinigungsunternehmens.  
Nutzer können Bestellungen aufgeben, Admins Bestellungen durchsuchen, verwalten und Rechnungen als PDF erzeugen.  
Das Projekt ist Docker- und Railway-bereit.

---

## Features
- Kunden: Registrierung & Login
- Bestellungen: Warenkorb, Terminwahl, Preisberechnung, Bestellabschluss
- PDF-Bestellbestätigung / Rechnung (TCPDF)
- Admin-Dashboard:
  - Bestellungen suchen
  - Bestellungen verwalten/abschließen
  - Nutzer sperren/entsperren
- Template Engine: **Smarty**
- Konfiguration über **.env** oder Railway Variables
- Deployment: **Docker** (Image) → **Railway**

---

## Projektstruktur
```
easywash/
├── docker/ # entrypoint.sh, Docker-Hilfsdateien
├── sql/ # schema.sql (DB Struktur)
├── includes/ # Bootstrap, startTemplate.inc.php
├── klassen/ # DbFunctions, SmartyEscaped, weitere Klassen
├── smarty/ # templates, templates_c, cache, configs
├── vendor/ # Composer-Packages (nach composer install)
├── README.md
├── Dockerfile
└── .env.example
```
---

## Tech Stack

- **Backend**: PHP 8.2 (Apache)
- **Frontend**: Smarty Templates
- **Datenbank**: MySQL (Railway Service)
- **PDF-Generierung**: TCPDF
- **Containerisierung**: Docker / Docker Compose
- **Hosting**: Railway

---

## Installation Voraussetzungen
- PHP 8.2+
- MySQL 8+
- Composer
- Docker (optional)

