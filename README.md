# Snap to Plan

**Recipes That Build Menus**

*A cookbook built like software.*

---

## The Story

I'm a software engineer who cooks constantly. Over time the patterns became obvious: a handful of staples plus repeatable methods build into great meals. The hardest part is always planning.

So I built this — a cookbook designed like a product. Clean typography, grids, reusable components, predictable templates. And a companion web experience that turns any recipe into a menu and shopping list in seconds.

**Staples** (components) → **Dishes** (builds) → **Menus** (compositions) → **Shopping Plans** (outputs)

This is software you can eat.

---

## What Ships

### 1) The Book

A standalone, premium cookbook.

- A4 portrait, hardcover
- Clean, grid-based layout (startup aesthetic)
- Consistent recipe and staple templates
- "Snap to Plan" as a subtle, structural motif — never a gimmick

The book works without the app. It's a real cookbook.

### 2) The Snap Experience

A fast, mobile-first web experience opened via QR codes ("Snap Codes").

- Renders recipe pages cleanly
- Builds curated menus around any dish
- Generates consolidated shopping lists
- Enables save/share without heavy onboarding

**Web-first.** No native apps for v1. Scan a code, get a plan.

### The Constraint

Both ship together in 2026, polished. No "book is done but app isn't" and no "app is done but content isn't."

---

## Product Principles

- **Quiet, confident design** — structural consistency over loud branding
- **Reduce cognitive load** — defaults, templates, curated sets
- **Fast** — scan → plan → list in under 60 seconds
- **Built like software** — components, tokens, repeatable patterns
- **Single source of truth** — one DB/schema drives book, Snap, and exports
- **No broken links** — QR codes always resolve via canonical URLs

---

## The Shared Contract

Before printing OR launch, these must be true:

| Requirement | Rule |
|-------------|------|
| Stable slugs | Every recipe and menu has a permanent `slug` |
| Canonical routes | `/scan`, `/r/{slug}`, `/m/{slug}` |
| QR encoding | Only canonical URLs (no env-specific links) |
| Editioning | `v1` edition tag so future changes don't break old books |
| Exports | JSON and Snap pages read from the same source-of-truth |

**Hard rule:** If a slug changes after QR generation, we regenerate QRs and re-proof. No exceptions.

---

## Scope: Book v1

### Targets

| Content | Count |
|---------|-------|
| Recipes | 30–40 |
| Staples | 6–10 |
| Curated menus | 10 |
| Hero photos | 18–22 (rest text-only) |

### Definition of Done

- [ ] TOC locked
- [ ] Recipe template locked
- [ ] Staple template locked
- [ ] All recipes finalized (taste, timing, yields, shortcuts, storage)
- [ ] Menus authored and tested for coherence
- [ ] Print proof approved (type legibility, colour, QR scan reliability)
- [ ] Final print-ready PDF export produced

### What "Finalized Recipe" Means

A recipe is final when it has:

- Title, slug, edition, course
- Servings, prep/cook time, difficulty (optional)
- Ingredients list
- Method steps (unambiguous)
- Shortcut (1–3 lines)
- Notes: swaps, storage, make-ahead (brief)
- Links to staples used (if applicable)
- Status: `published`

---

## Scope: Snap Experience v1

### Must-Have Journeys

**From a Snap Code scan:**

**1. Recipe page** `/r/{slug}`
- Mobile-first layout
- Serves, prep, cook time
- Ingredients + method
- Actions: build a menu, generate shopping list, scale servings (×0.5 / ×1 / ×2)

**2. Menu page** `/m/{slug}`
- Courses + "why it works"
- Consolidated shopping list
- Prep order (do ahead / day of)

**3. Shopping list**
- Aggregated ingredients
- Grouped by category
- Copyable, printable, shareable

**4. Save/share**
- Share link, email plan, or copy list
- Minimal friction, no mandatory signup

### Explicitly Out of Scope (v1)

- Native iOS/Android apps
- Grocery cart checkout (Coles/Woolies integration)
- Subscriptions or payments
- Real-time AI menu generation (menus are curated)
- Full ingredient normalization (nice-to-have later)

### Definition of Done

- [ ] `/scan`, `/r/{slug}`, `/m/{slug}` work for every published item
- [ ] QR scan works reliably from iOS and Android cameras
- [ ] Fast and stable in production
- [ ] Basic analytics: scan → menu → list → share
- [ ] Deployed with CI pipeline and health checks

---

## Content System

The cookbook is engineered, not just written.

### Staples (Components)

Reusable bases that unlock multiple dishes.

Each staple includes:
- **Homemade method** — the proper way
- **Shortcut** — store-bought fallback
- **Activation** — how to make the shortcut taste homemade
- **Unlocks** — dishes that use this staple

**v1 Staples:**
- Herb butter
- Chicken stock (+ "Stock Bag" freezer habit)
- Caramelised onions
- Mint-garlic yoghurt
- Hummus
- Warm spice mix (baharat-ish)
- Quick pickled red onions

### Dishes (Builds)

Recipes that intentionally reuse staples and overlap ingredients.

Each dish defines:
- Non-negotiables (if any)
- Shortcut path
- Leftover transforms (optional)

### Menus (Compositions)

Curated like a restaurant menu.

- Starter + main + side (+ dessert optional)
- Designed for ingredient overlap and prep efficiency
- Each menu includes a shopping list + prep order

---

## "Snap to Plan" Motif

The recurring visual/structural element connecting book to app.

### Design Rules

- Appears once per recipe page as a footer/meta strip
- **Never** overlays hero photography
- Minimal copy, consistent placement, consistent sizing
- QR is called a "Snap Code" and encodes the canonical URL

### Microcopy

```
Snap to Plan · Menu + shopping list · [QR]
```

### The Dual Meaning

1. **Snapping fingers** — effortless planning (cover concept)
2. **Snapping a QR** — scan to plan instantly

Subtle. Structural. Never gimmicky.

---

## Recipe Seed Format

Before recipes are fully authored, they exist as "seeds" — minimal Markdown files with an idea.

**Location:** `content/recipes/<slug>.md`

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

**Field reference:**

| Field | Required | Values |
|-------|----------|--------|
| `name` | yes | Display name |
| `slug` | yes | kebab-case, permanent |
| `type` | yes | `dish` or `staple` |
| `course` | yes | `staple`, `starter`, `side`, `main`, `dessert`, `lunch`, `snack` |
| `edition` | yes | `v1` default |
| `status` | yes | `seed`, `draft`, `testing`, `published` |
| `hero` | yes | `true` or `false` |
| `tags` | yes | array, lowercase, kebab-case |
| `created` | yes | `YYYY-MM-DD` |

---

## Repo Structure

```
cookbook/
├── src/                    # Laravel codebase (Nova + Snap web)
├── content/
│   └── recipes/            # Recipe seed files (.md)
├── exports/
│   ├── json/               # recipes.v1.json, menus.v1.json
│   └── print/              # Print-ready PDFs (generated)
├── brand/
│   ├── typography/
│   ├── components/         # Snap motif spec
│   ├── covers/
│   └── narrative.md        # Brand/narrative quick reference
├── docs/
│   └── claude.md           # AI agent operating manual
├── CLAUDE.md               # Claude Code context
└── README.md               # This file
```

---

## Tech Stack

- **Laravel** — API, web, exports
- **Nova** — authoring and admin
- **SQLite** local, **Postgres** production
- **Queues** — exports and background jobs
- **Pint + Larastan + Pest** — code quality
- **Blade + Alpine** or **Inertia** — Snap pages (pick one, stay consistent)

---

## Data Model (v1)

| Entity | Purpose |
|--------|---------|
| `Edition` | Version tracking (v1, v2, etc.) |
| `Recipe` | Dishes and staples (with `type` enum) |
| `Ingredient` | Simple model; normalization later |
| `Tag` | Categorization |
| `Menu` | Curated menu compositions |
| `MenuItem` | Course + recipe reference |
| `Media` | Photos (optional v1; can store paths) |

**Staples:** Use `recipes.type = staple` rather than a separate model.

---

## Exports

### JSON (source for book tooling + integrations)

- `exports/json/recipes.<edition>.json`
- `exports/json/menus.<edition>.json`

Must include: stable IDs, slugs, titles, ingredients, steps, tags, menu composition, edition metadata.

### Print (later)

- Print-ready PDF generated from exported content + design system
- Proof cycles tracked via versioning

---

## Workflow

Weekly cadence to ship in 2026:

| Task | Frequency |
|------|-----------|
| Capture recipes (raw notes into Nova) | 2/week |
| Finalize recipes (clean steps, shortcuts, notes) | 1/week |
| Author menus (curated sets) | 1/fortnight |

---

## Quality Bar

### Code

- Pint clean
- Larastan clean
- Pest passing
- Basic observability (logs, error reporting)

### Content

- No ambiguous steps
- Realistic salt/heat/timing guidance
- Every recipe has a shortcut path

---

## Development Phases

### Phase 1: The Workshop (Current)

Laravel + Nova as a local authoring environment. Build the content, refine the data model, export to JSON. This same codebase becomes the production backend.

**Goals:**
- Scaffold Laravel + Nova locally
- Build data model: recipes, staples, tags, menus, editions
- CRUD everything via Nova
- Seed initial recipes from `content/recipes/`
- Export commands for JSON
- Iterate on content until book-ready

**Not yet:**
- Public Snap pages
- Production deployment
- QR code generation

### Phase 2: The Snap Experience

Once content is solid, build the public-facing Snap pages on top of the same Laravel app.

### Phase 3: Production + Launch

Deploy, generate QR codes, print proof, ship.

---

## Roadmap (2026)

### Q1 — Foundations

- **Set up Laravel + Nova workshop**
- Lock shared contract (slugs, canonical URLs, editioning)
- CRUD: recipes, staples, tags, menus
- Export commands for JSON
- Enter 10–15 anchor recipes + staples

### Q2 — Production

- 30–40 recipes drafted/finalizing
- 10 menus authored
- Snap pages polished
- Shopping list aggregation working

### Q3 — Polish

- Photography sprint
- Manuscript assembly + QA sweep
- Snap performance/UX pass
- Print proof approved

### Q4 — Launch

- Print + digital release
- Snap experience live + stable
- Marketing and gifting campaign

---

## Commands

From `src/`:

```bash
# Install
composer install
cp .env.example .env
php artisan key:generate

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

---

## License

Private project. Content, photography, and brand assets are not open-source.

---

Maintained by Rhys May.
