---
# Schema version for future compatibility
schema: tbc.recipe.v1

# Core identification (maps to recipes table)
id: recipe-slug                    # Becomes 'slug' in DB (composite unique with edition_id)
title: Recipe Name                 # Becomes 'name' in DB
type: dish                         # RecipeType enum: dish | staple
course: main                       # Course enum: staple | starter | side | main | dessert | lunch | snack
edition: v1                        # Edition slug
status: seed                       # RecipeStatus enum: seed | draft | testing | published
hero: false                        # Hero photography?

# Created timestamp (for reference)
created: null                      # YYYY-MM-DD

# Tags (many-to-many, auto-created)
tags:
- tag-one
- tag-two

# Yield (maps to recipes.servings - pick one or provide number)
yield:
  serves: null                     # Number: 4
  makes: null                      # String: "2 cups" or "12 pieces"

# Timing (maps to recipes.prep_time and recipes.cook_time in minutes)
time:
  prep_min: null                   # Maps to recipes.prep_time (integer minutes)
  cook_min: null                   # Maps to recipes.cook_time (integer minutes)
  total_min: null                  # Calculated convenience (not stored)

# Difficulty (maps to recipes.difficulty - optional string for now)
difficulty: null                   # Easy | Medium | Hard

# Structured ingredients (seeded into ingredients table)
# Each ingredient becomes a separate record with: recipe_id, amount, unit, name, notes, sort_order
ingredients:
- amount: "2"                      # String: "2", "1/2", "a pinch", "to taste"
  unit: "cups"                     # String: "cups", "tbsp", "cloves" (nullable)
  name: "ingredient name"          # Required: e.g., "onion, diced" or "butter"
  notes: "any clarification"       # Optional: "or shallots", "room temp", "plus extra for dusting"
  sort_order: 1                    # Order in the list (no one wants salt before onions)

# Structured steps (currently stored in method_raw field)
# Consider: Store as JSON in method_raw, or add new steps JSON column to recipes table
steps:
- instruction: "Prepare ingredients as described"
  timing_min: null                 # Optional: approximate time for this step
  temp: null                       # Optional: heat level (low, medium, high)
  technique: null                  # Optional: named technique (sauté, deglaze, emulsify)
  visual_cue: null                 # Optional: what it should look like
  notes: null                      # Optional: additional context

# Equipment (not currently in DB - consider adding equipment JSON column)
equipment:
- item: "tool name"
  size: null                       # Optional: "10 inch", "large"
  essential: true                  # Required vs nice-to-have
  notes: null                      # Why it matters

# References (for external links, similar recipes, inspiration)
references:
- type: external_similar           # Type: external_similar, external_technique, inspiration
  label: "Similar recipe"          # Display text
  target: "https://example.com"    # URL

# Recipe relationships (many-to-many via recipe_staple pivot table)
links:
  uses: []                         # Array of staple slugs this recipe uses
  used_by: []                      # Array of dish slugs that use this (if this is a staple)

# Snap experience metadata (not in DB - for export/display logic)
snap:
  motif: "Snap to Plan"
  microcopy: "Snap to Plan · Menu + shopping list · [QR]"
  placement: "recipe-footer"
---

## Raw Idea
Describe the concept in 2–5 sentences. What makes this dish interesting? What staples does it use? Any key technique or shortcut worth noting? Keep it loose — this is a seed, not a full recipe.

**Seeded into:** `recipes.idea` field (raw capture, author convenience)

## Overview
A more polished version of the concept, suitable for publication. 2-3 sentences that could go in the book or app.

**Maps to:** `recipes.description` field (curated, publication-ready)

## Why This Works
Technical explanation of the key principle or technique. What's the science or method that makes this successful?

**Purpose:** Educational content for the Snap experience or book sidebars.

## Key Technique
The one thing to nail for success. The make-or-break moment or skill this recipe teaches.

**Purpose:** Skill focus for the recipe.

## Shortcut
The quick path. Every recipe needs one. Could be jarred, pre-made, store-bought substitute, or simplified version.

**Seeded into:** `recipes.shortcut` field (curated, publication-ready)

## Variations
- **Variation name**: What changes and why
- **Another variation**: Different approach or ingredient swap

**Maps to:** Part of `recipes.notes` field or stored separately for Snap experience.

## Storage
- **Fridge**: X days in airtight container
- **Freezer**: X months in portions, ice cube trays work great
- **Counter**: Best served immediately / doesn't store well

**Maps to:** Part of `recipes.notes` field (curated).

## Make Ahead
What can be prepped in advance? What's better fresh? Timing strategy for entertaining.

**Maps to:** Part of `recipes.notes` field (curated).

## Troubleshooting
- **Problem?** Solution and why it happened
- **Another issue?** How to fix or prevent next time

**Purpose:** Helpful for the Snap experience, builds confidence.

## Uses / Pairs With
What does this unlock? (For staples: which dishes use this? For dishes: what staples does it build on? What does it pair with?)

**Purpose:** Shows connections in the recipe ecosystem.

## Additional Notes
Any additional author notes, ingredient swaps, seasonality, cost notes, or context that doesn't fit elsewhere.

**Maps to:** Part of `recipes.notes` field (curated).
