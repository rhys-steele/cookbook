# Claude Operating Manual

This document is written for AI agents (Claude) working on the Snap to Plan project. It defines the narrative canon, constraints, conventions, and checklists for safe, consistent contributions.

---

## Current Phase: The Workshop

Laravel + Nova as a **local authoring environment**. The same codebase becomes the production backend later.

**What we're building now:**
- Laravel + Nova scaffold in `src/`
- Data model: Edition, Recipe, Ingredient, Tag, Menu, MenuItem
- Nova resources for full CRUD
- Seeder to import from `content/recipes/`
- Artisan commands: `export:recipes`, `export:menus`

**What we're NOT building yet:**
- Public-facing Snap pages (`/r/{slug}`, `/m/{slug}`)
- Production deployment
- QR code generation
- Authentication for end users

**Why this order:** Content and data model must be solid before building public pages. The workshop lets us iterate on recipes, test the schema, and export to JSON for book tooling.

### Laravel Boost MCP Tools

When working on Laravel code, use these tools:

| Tool | Use For |
|------|---------|
| `search-docs` | Search Laravel/Nova docs (use BEFORE coding) |
| `list-artisan-commands` | Check artisan commands and options |
| `tinker` | Execute PHP to debug or query models |
| `database-query` | Read-only database queries |

**Critical:** Always `search-docs` before making Laravel changes.

---

## Narrative Canon

These facts are immutable. Never contradict them.

### The Author
- A software engineering founder who loves cooking
- Built the best of both worlds: a cookbook designed like software

### The Product
- **Two outputs ship together in 2026:**
  1. A standalone premium cookbook (A4 hardcover)
  2. A web-first Snap experience (mobile QR-driven)
- The book works without the app. It's a real cookbook.
- The Snap experience turns any recipe into a menu + shopping list instantly.

### The System
- **Staples** (components) → **Dishes** (builds) → **Menus** (compositions) → **Shopping Plans** (outputs)
- This is software you can eat.

### The Motif: "Snap to Plan"
- Dual meaning:
  1. Snapping fingers (effortless planning, cover concept)
  2. Snapping a QR code (scan to plan instantly)
- **Rules:**
  - Subtle and structural, never loud or gimmicky
  - Never overlays hero photography
  - Appears once per recipe page as a footer/meta strip
  - QR codes are called "Snap Codes"

### The Constraint
- Book and Snap experience must ship together, polished.
- No "book is done but app isn't" and no "app is done but content isn't."

---

## Non-Negotiables

These cannot be changed without explicit project-level decision:

| Rule | Reason |
|------|--------|
| Slugs are permanent once QR codes exist | Printed books can't update |
| Canonical routes: `/scan`, `/r/{slug}`, `/m/{slug}` | QR codes encode these |
| QR codes encode canonical URLs only | No environment-specific links |
| Editioning (`v1`) on all content | Future changes don't break old books |
| Single source of truth | One DB drives book, Snap, and exports |
| "Snap to Plan" is structural, not decorative | Brand integrity |

---

## Out of Scope (v1)

Do not implement, suggest, or design for:

- Native iOS/Android apps
- Grocery cart checkout (Coles, Woolies, etc.)
- Subscriptions or payments
- Real-time AI menu generation (menus are curated)
- Full ingredient normalization (nice-to-have later)
- Social features (comments, ratings, followers)
- User-generated recipes
- Multi-language support

---

## File Conventions

### Paths

| Content | Location |
|---------|----------|
| Recipe seeds | `content/recipes/<slug>.md` |
| Recipe template | `content/recipes/_TEMPLATE.md` |
| JSON exports | `exports/json/recipes.<edition>.json` |
| Print exports | `exports/print/` |
| Brand narrative | `brand/narrative.md` |
| This manual | `docs/claude.md` |
| Laravel app | `src/` |
| Laravel Boost guidelines | `src/CLAUDE.md` |
| MCP config (root) | `.mcp.json` |
| MCP config (src) | `src/.mcp.json` |

### Laravel Conventions

- PHP 8.4 with constructor property promotion
- Explicit return types on all methods
- Middleware in `bootstrap/app.php`
- Casts in `casts()` method on models
- PHPUnit for tests (not Pest)
- Run `./vendor/bin/pint --dirty` before finalizing
- Use `search-docs` MCP tool before making changes

### Naming

| Thing | Convention | Example |
|-------|------------|---------|
| Slugs | kebab-case, permanent | `herb-butter`, `steak-frites-with-herb-butter` |
| Tags | lowercase, kebab-case | `uses-herb-butter`, `middle-eastern` |
| Edition | `v1`, `v2`, etc. | `v1` |
| Files | Match slug | `herb-butter.md` |

---

## Recipe Seed Format

Seeds are minimal Markdown files capturing an idea before full authoring.

```markdown
---
name: Recipe Name
slug: recipe-name
type: dish
course: main
edition: v1
status: seed
hero: false
tags:
  - tag-one
  - tag-two
created: YYYY-MM-DD
---

## Raw idea:

2–5 sentences describing the concept. What makes it interesting? What staples does it use? Any key technique or shortcut? Keep it loose.
```

### Field Values

| Field | Type | Values |
|-------|------|--------|
| `type` | enum | `dish`, `staple` |
| `course` | enum | `staple`, `starter`, `side`, `main`, `dessert`, `lunch`, `snack` |
| `status` | enum | `seed`, `draft`, `testing`, `published` |
| `hero` | boolean | `true`, `false` |
| `edition` | string | `v1` (default) |

---

## Writing Style

### Voice

- Confident, minimal, founder-y
- Warm but direct
- No "spiritual journey" language
- Product-driven, clear definitions

### Microcopy Rules

**Do:**
- `Snap to Plan · Menu + shopping list`
- `Build a menu around this`
- `Generate shopping list`
- `Scale servings`

**Don't:**
- "Discover your culinary journey"
- "Unlock the magic of home cooking"
- "Transform your kitchen experience"
- Any superlatives without substance

### Quiet Design Rules

- Structural consistency over loud branding
- Defaults and templates over endless options
- Minimal copy, consistent placement
- Never overlay functional elements on hero photography

---

## Safe Repo Updates

### Before Any Change

1. Read the README and this manual
2. Understand the shared contract (slugs, routes, editioning)
3. Check if the change affects canonical URLs

### Commit Guidelines

- Small, focused commits
- Clear commit messages describing what and why
- Never batch unrelated changes

### Dangerous Changes (Require Explicit Approval)

- Changing any slug that may have a QR code
- Modifying canonical route patterns
- Changing the edition schema
- Removing published content

---

## Checklist: Adding a New Recipe

```
[ ] Create seed file at content/recipes/<slug>.md
[ ] Slug is kebab-case and descriptive
[ ] All frontmatter fields populated
[ ] Type is correct (dish or staple)
[ ] Course is correct
[ ] Tags include any `uses-<staple>` references
[ ] Raw idea section is 2–5 sentences
[ ] File name matches slug
```

### Later (When Adding to DB)

```
[ ] Slug matches seed file exactly
[ ] Canonical URL will work: /r/<slug>
[ ] Edition is set (v1)
[ ] Status starts as draft, not published
```

---

## Checklist: Release Readiness

### Book v1

```
[ ] TOC locked
[ ] Recipe template locked
[ ] Staple template locked
[ ] 30–40 recipes finalized
[ ] 6–10 staples finalized
[ ] 10 menus authored
[ ] All recipes have: title, slug, ingredients, method, shortcut, notes
[ ] All recipes marked status: published
[ ] Print proof approved (type, colour, QR scan test)
[ ] Final PDF export produced
```

### Snap Experience v1

```
[ ] /scan route works
[ ] /r/{slug} works for every published recipe
[ ] /m/{slug} works for every published menu
[ ] QR codes scan reliably (iOS + Android tested)
[ ] Shopping list aggregation works
[ ] Share/export works
[ ] Performance acceptable on mobile
[ ] Analytics events firing (scan → menu → list → share)
[ ] CI pipeline green
[ ] Health checks configured
[ ] Production deployed and stable
```

### Shared Contract

```
[ ] All slugs stable and final
[ ] QR codes generated with canonical URLs only
[ ] Edition (v1) applied to all content
[ ] JSON exports match live Snap data
```

---

## Quick Reference

### Canonical Routes

| Route | Purpose |
|-------|---------|
| `/scan` | Entry point (QR landing) |
| `/r/{slug}` | Recipe page |
| `/m/{slug}` | Menu page |

### Content Hierarchy

```
Staples (components)
    ↓
Dishes (builds using staples)
    ↓
Menus (compositions of dishes)
    ↓
Shopping Plans (aggregated ingredients)
```

### Status Flow

```
seed → draft → testing → published
```

---

## When in Doubt

1. Preserve the narrative canon
2. Don't break canonical URLs
3. Keep it simple and shippable
4. Ask before making structural changes
