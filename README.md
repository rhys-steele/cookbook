# Recipe Station

A beautifully designed cookbook (print + digital) paired with a companion app that turns recipes into menus and shopping plans.

## Overview

**The Cookbook** — A curated set of recipes designed like a product: clean typography, strong systems, repeatable templates, and a "snap to plan" motif baked into the structure.

**The Companion App** — A lightweight web app to save recipes, build menus, generate shopping lists, and plan a week in minutes.

The goal is to ship both in 2026 without one blocking the other.

## Product Principles

- **Elegant, quiet design**: consistent, subtle system over loud branding
- **Reduce cognitive load**: defaults, sensible templates, minimal choices
- **Fast to use**: plan a week in under 5 minutes
- **Built like a product**: design tokens, reusable components, docs

## Cookbook

**Outputs**
- Final manuscript (recipes, intros, systems, indexes)
- Design system (typography, spacing, components, callouts)
- Photography/visual direction
- Print-ready export + digital edition (PDF/ePub)

**Core concepts**
- "Snap to plan" as a structural motif
- Clear recipe templates (time, difficulty, gear, swaps, storage)
- Menu-building orientation (recipes are meant to be combined)

**Definition of Done**
- Table of contents locked
- Recipe template locked
- 50+ tested recipes (taste, timing, substitutions, storage notes)
- Digital edition export ready (PDF)
- Print-ready files prepared

## Companion App

**User journeys**
- Add and browse recipes
- Build a menu (e.g., week plan)
- Auto-generate a shopping list
- Save/share a plan

**MVP features**
- Authentication
- Recipe CRUD with admin/editor workflow
- Plan builder
- Shopping list generator (ingredient aggregation + quantities)
- Export/share (PDF/email/link)
- Tests + linting passing
- Deployment pipeline + basic observability

**Tech stack**
- Laravel (API + web)
- Nova (admin/editor UI)
- SQLite for local dev, Postgres in production
- Queues for exports and background jobs
- Pint + Larastan + Pest

## Repo Structure

```
cookbook/
├── manuscript/
│   └── recipes/
├── layout/
├── exports/
├── app/
│   └── (Laravel codebase)
├── brand/
│   ├── logo/
│   ├── typography/
│   └── components/
└── docs/
```

## Roadmap

**Q1 — Foundations**
- Cookbook: lock concept + ToC, create templates, produce 10–15 anchor recipes
- App: scaffold app, build data model, implement recipes CRUD

**Q2 — Production**
- Cookbook: 25–40 recipes done, layout system stable
- App: plan builder + shopping list generator, basic export/share

**Q3 — Polish**
- Cookbook: manuscript complete, QA sweep, design polish, photography pass
- App: usability pass, performance, tests, analytics/metrics, onboarding

**Q4 — Launch**
- Cookbook: print/digital release + distribution
- App: public MVP release aligned to cookbook launch

## Future Ideas

- Ingredient normalization ("spring onion" vs "scallion")
- Auto-tagging recipes (diet, cuisine, time, difficulty)
- Smart shopping list grouping by aisle
- "Use what you have" suggestions
- Leftovers chaining (plan meals that reuse ingredients)

## Contributing

- Follow the templates in `/cookbook/layout` for manuscript changes
- Keep app changes tested and documented
- Prefer small, shippable increments

## License

TBD. Cookbook content and brand assets are not open-source by default.

---

Maintained by Rhys May.
