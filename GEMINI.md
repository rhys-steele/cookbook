# Project: TBC (Snap to Plan)

## Project Overview

"TBC (Snap to Plan)" is a hybrid project that combines a physical cookbook with a companion web experience. The project is built with the philosophy of "a cookbook built like software," where recipes and menus are treated as structured data and components.

The core components are:
- **Staples:** Reusable base recipes (e.g., stocks, sauces).
- **Dishes:** Main recipes that utilize staples.
- **Menus:** Curated collections of dishes.
- **Shopping Plans:** Generated shopping lists from recipes or menus.

The project is developed in distinct phases, starting with building the content and authoring tools, followed by the public-facing web experience.

## Current Development Phase: The Workshop

The project is currently in the "Workshop" phase.

**Focus:**
- Local authoring environment using Laravel + Nova.
- Building and refining the data model for recipes, staples, tags, menus, and editions.
- Seeding initial content from the `content/recipes/` directory.
- Creating JSON export commands.

**Explicitly out of scope for this phase:**
- Public-facing web pages (the "Snap Experience").
- Production deployment and infrastructure.
- QR code generation.

## Tech Stack

The `src` directory contains a Laravel (PHP) application that serves as the backend for both the authoring environment and the public web application.

- **Backend:** Laravel 12
- **Admin/CMS:** Laravel Nova
- **Database:** SQLite (local), PostgreSQL (production)
- **Frontend:** Blade with Alpine.js or Inertia.js
- **Code Quality:** Pint (styling), Larastan (static analysis), Pest (testing)
- **Content:** Markdown files in the `content/recipes` directory for recipe "seeds."

## Directory Structure & Key Files

| File/Directory | Purpose |
|----------------|---------|
| `README.md` | The primary execution bible for the project. |
| `GEMINI.md` | **(This file)** The authoritative context guide for AI agents. |
| `brand/narrative.md` | Reference for the project's voice, tone, and copy. |
| `content/recipes/` | Location for all recipe "seed" Markdown files. |
| `src/` | The main Laravel application codebase. |
| `src/CLAUDE.md` | Detailed, technical guidelines for AI-assisted Laravel development. |
| `docs/` | Additional project documentation. |
| `exports/` | Directory for generated outputs like JSON and PDFs. |


## Building and Running

All commands should be run from within the `src` directory.

### Installation

```bash
composer install
cp .env.example .env
php artisan key:generate
```

### Running the Application

```bash
php artisan migrate --seed
php artisan serve
```

### Quality Checks

```bash
# Code Styling (run before finalizing changes)
./vendor/bin/pint --dirty

# Static Analysis
./vendor/bin/phpstan analyse

# Running Tests (use --filter for specific tests)
php artisan test --compact
```

### Data Exports

```bash
php artisan export:recipes v1
php artisan export:menus v1
```

## Laravel Boost Tools

This project is equipped with Laravel Boost, which provides a suite of powerful tools to aid development. Use them from the `src/` directory.

| Tool | Use For |
|------|---------|
| `search-docs` | **(Use First)** Search version-specific Laravel ecosystem documentation. |
| `list-artisan-commands` | Check available artisan commands and their options. |
| `tinker` | Execute arbitrary PHP to debug or query models. |
| `database-query` | Perform read-only queries against the database. |
| `browser-logs` | Read recent browser errors and exceptions. |
| `get-absolute-url` | Get the correct, shareable URL for the application. |

---

## Development Conventions

- **Content-First:** The initial phase of development focuses on building out the recipe and menu content using Laravel Nova as an authoring tool.
- **Single Source of Truth:** The Laravel application and its database are the single source of truth for all structured content.
- **Stable Slugs:** All recipes and menus must have a permanent, URL-friendly `slug`.
- **Canonical URLs:** The web application uses a consistent URL structure (`/r/{slug}` for recipes, `/m/{slug}` for menus).
- **Editioning:** Content is versioned (e.g., `v1`) to prevent future changes from breaking printed materials (like QR codes in the physical book).

### Laravel 12 Conventions

- PHP 8.4 with constructor property promotion.
- Explicit return types on all methods.
- Middleware is configured in `bootstrap/app.php`.
- Model attribute casting is defined in a `casts()` method, not the `$casts` property.
- Tests are written using Pest.
- **For more detailed guidelines on Laravel development, refer to the `src/CLAUDE.md` file.**

---

## Recipe Data and Manifesto Sync

To keep the recipe "manifesto" (the `Raw idea` in the Markdown files) in sync with the structured recipe data (ingredients, measurements, etc.) in the database, we will use a **Hybrid Model**.

### Concept

The Markdown files in `content/recipes/` are the **single source of truth** for the recipe manifesto. The database holds the structured data (ingredients, steps) and a *read-only copy* of the manifesto for display purposes in the Nova admin interface.

This approach ensures the manifesto is version-controlled in Git while preventing accidental data loss from two-way syncs.

### Sync Process

A custom Artisan command, `php artisan recipes:sync-manifestos`, will handle the synchronization. The process is as follows:

1.  The command parses all `.md` files in the `content/recipes` directory.
2.  For each file, it extracts the `slug` and the `Raw idea` content.
3.  It finds the corresponding `Recipe` model in the database via the `slug`.
4.  It updates two columns on the `recipes` table:
    *   `manifesto`: A text column containing the full "Raw idea" content.
    *   `manifesto_last_synced`: A timestamp to record when the sync occurred.

### Nova UI

The `app/Nova/Recipe.php` resource will be configured to provide a seamless authoring experience:

-   The `manifesto` field will be displayed as a `Textarea` field.
-   This field will be marked as `->readonly()`, preventing direct edits within Nova.
-   The `manifesto_last_synced` timestamp will be displayed alongside it, giving authors clarity on the freshness of the content.

This allows authors to view the manifesto for context while adding structured ingredients and steps in the same interface.

### Workflow

1.  **To Edit a Manifesto:** The developer or author **must** edit the `Raw idea` section in the relevant `content/recipes/<slug>.md` file.
2.  **To Sync Changes:** After saving the Markdown file, the author will run `php artisan recipes:sync-manifestos`.
3.  **To Add Structured Data:** The author can then open the recipe in Nova and will see the updated, read-only manifesto while they add ingredients, measurements, and steps.
