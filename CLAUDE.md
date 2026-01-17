# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

For the full AI operating manual, see: `docs/claude.md`

## Project Overview

**Snap to Plan** — A cookbook built like software.

Two products shipping together in 2026:
1. **The Book** — A premium A4 hardcover cookbook
2. **The Snap Experience** — A mobile-first web app opened via QR codes ("Snap Codes")

**Key constraint:** Both must ship together, polished. Single source of truth drives book, Snap, and exports.

## Current Phase: The Workshop

Laravel + Nova as a local authoring environment. Build the content, refine the data model, export to JSON. This same codebase becomes the production backend later.

**Focus now:**
- Scaffold Laravel + Nova
- Build data model (recipes, staples, tags, menus, editions)
- CRUD via Nova
- Seed recipes from `content/recipes/`
- JSON export commands

**Not yet:** Public Snap pages, production deployment, QR codes.

## Architecture

- **Laravel** — API, web, exports
- **Nova** — Authoring/admin
- **SQLite** local, **Postgres** production
- **Blade + Alpine** or **Inertia** — Snap pages

## Commands

From `src/`:

```bash
# Install
composer install && cp .env.example .env && php artisan key:generate

# Run
php artisan migrate --seed
php artisan serve

# Quality
./vendor/bin/pint
./vendor/bin/phpstan analyse
php artisan test

# Exports
php artisan export:recipes v1
php artisan export:menus v1
```

## Canonical Routes

These are encoded in printed QR codes — they must remain stable:

- `/scan` — entry point
- `/r/{slug}` — recipe page
- `/m/{slug}` — menu page

**Hard rule:** If a slug changes after QR generation, regenerate QRs and re-proof.

## Content System

- **Staples** → **Dishes** → **Menus** → **Shopping Plans**
- Recipe seeds: `content/recipes/<slug>.md`
- Recipes have `type`: `staple` or `dish`

## Non-Negotiables

- Slugs are permanent once QR codes exist
- QR codes encode canonical URLs only
- "Snap to Plan" is structural, never gimmicky, never over hero photos
- Single source of truth for all outputs

## Key Files

| File | Purpose |
|------|---------|
| `README.md` | Execution bible |
| `docs/claude.md` | Full AI operating manual |
| `brand/narrative.md` | Voice and copy reference |
| `content/recipes/_TEMPLATE.md` | Recipe seed template |
