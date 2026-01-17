# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

For the full AI operating manual, see: `docs/claude.md`

---

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

---

## Laravel Application

The Laravel app lives in `src/`. All artisan commands must be run from that directory.

### MCP Server

Laravel Boost MCP server is configured in `src/.mcp.json`. When working from the root directory, use the root `.mcp.json` which proxies to src.

### Commands

From `src/`:

```bash
# Install
composer install && cp .env.example .env && php artisan key:generate

# Run
php artisan migrate --seed
php artisan serve

# Quality
./vendor/bin/pint --dirty
./vendor/bin/phpstan analyse
php artisan test --compact

# Exports
php artisan export:recipes v1
php artisan export:menus v1
```

---

## Laravel Boost Tools

When working on Laravel code, use these MCP tools from Laravel Boost:

| Tool | Use For |
|------|---------|
| `search-docs` | Search Laravel/Nova documentation (use BEFORE coding) |
| `list-artisan-commands` | Check available artisan commands and options |
| `tinker` | Execute PHP to debug or query models |
| `database-query` | Read-only database queries |
| `browser-logs` | Read browser errors and exceptions |
| `get-absolute-url` | Get correct URL for sharing with user |

**Critical:** Always use `search-docs` before making Laravel code changes to ensure correct approach.

---

## Laravel 12 Conventions

- PHP 8.4 with constructor property promotion
- Explicit return types on all methods
- Middleware configured in `bootstrap/app.php`
- Casts defined in `casts()` method on models
- PHPUnit for tests (not Pest)
- Run `./vendor/bin/pint --dirty` before finalizing changes

---

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
| `src/CLAUDE.md` | Laravel Boost guidelines |
| `src/.mcp.json` | Laravel Boost MCP config |
