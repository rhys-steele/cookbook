---
# Schema version for future compatibility
schema: tbc.recipe.v1

# Core identification (maps to recipes table)
id: steak-frites-with-herb-butter
title: Steak Frites with Herb Butter
type: dish
course: main
edition: v1
status: seed
hero: true

# Created timestamp
created: 2026-01-17

# Tags
tags:
- steak
- beef
- french
- bistro
- date-night
- simple
- classic

# Yield
yield:
  serves: 2
  makes: null

# Timing
time:
  prep_min: 10
  cook_min: 30
  total_min: 40

# Difficulty
difficulty: Medium

# Structured ingredients
ingredients:
- amount: "2"
  unit: null
  name: "ribeye or sirloin steaks"
  notes: "250-300g each, 2.5cm thick, room temperature"
  sort_order: 1

- amount: "2"
  unit: "tsp"
  name: "flaky sea salt"
  notes: "for pre-salting"
  sort_order: 2

- amount: "1"
  unit: "tbsp"
  name: "neutral oil"
  notes: "grapeseed, vegetable, or light olive oil"
  sort_order: 3

- amount: "2"
  unit: "rounds"
  name: "herb butter"
  notes: "1cm thick slices from frozen log"
  sort_order: 4

- amount: "500"
  unit: "g"
  name: "potatoes"
  notes: "for chips - Maris Piper or similar starchy variety"
  sort_order: 5

- amount: "to taste"
  unit: null
  name: "black pepper"
  notes: "freshly ground"
  sort_order: 6

- amount: "as needed"
  unit: null
  name: "vegetable oil for frying"
  notes: "or use frozen oven chips as shortcut"
  sort_order: 7

# Structured steps
steps:
- instruction: "Remove steaks from fridge 30-60 minutes before cooking. Pat completely dry with paper towels. Season generously with salt on both sides. Let sit."
  timing_min: 1
  temp: null
  technique: null
  visual_cue: "Steaks at room temp, surface completely dry, visible salt crystals"
  notes: "Dry surface is crucial for browning. Room temp cooks more evenly."

- instruction: "For proper chips: Cut potatoes into 1cm thick fries. Rinse in cold water, drain, pat dry thoroughly. Heat oil to 130°C and fry for 8-10 minutes until soft but no color. Drain on paper towels."
  timing_min: 15
  temp: "130°C"
  technique: "double_frying"
  visual_cue: "Fries soft and cooked through but pale, no browning"
  notes: "This is the first fry - cooking through. Shortcut: skip this and use frozen oven chips."

- instruction: "Heat a heavy pan (cast iron ideal) over high heat until smoking. Add oil, swirl to coat. Immediately add steaks - they should sizzle loudly."
  timing_min: 2
  temp: "high"
  technique: "searing"
  visual_cue: "Pan visibly smoking, oil shimmering, loud sizzle when steak hits"
  notes: "Don't move the steaks once they hit the pan"

- instruction: "Sear first side for 3-4 minutes without moving. Flip once when deeply browned and crust has formed. Sear second side for 3-4 minutes."
  timing_min: 7
  temp: "high"
  technique: "searing"
  visual_cue: "Deep brown crust, mahogany color, releases easily from pan"
  notes: "For medium-rare on 2.5cm steak. Adjust timing for preference."

- instruction: "Transfer steaks to a warm plate. Top each with a round of herb butter. Tent loosely with foil and rest for 5-8 minutes."
  timing_min: 7
  temp: null
  technique: "resting"
  visual_cue: "Butter melting slowly over steak, juices pooling on plate"
  notes: "Resting is non-negotiable - lets juices redistribute"

- instruction: "While steak rests: Heat oil to 180°C. Fry chips for 3-4 minutes until golden and crispy. Drain, season immediately with salt."
  timing_min: 5
  temp: "180°C"
  technique: "double_frying"
  visual_cue: "Chips golden brown, crispy outside, steam rising"
  notes: "Second fry creates the crunch. If using oven chips, cook per package."

- instruction: "Plate: Steak with melted herb butter pooled around it, pile of hot chips, crack of black pepper over steak."
  timing_min: 1
  temp: null
  technique: null
  visual_cue: "Bistro classic - steak glistening, chips piled high"
  notes: "Simple presentation. A green salad on the side if desired."

# Equipment
equipment:
- item: "Heavy frying pan or cast iron skillet"
  size: "10-12 inch"
  essential: true
  notes: "Cast iron ideal for even heat and crust"

- item: "Tongs"
  size: null
  essential: true
  notes: "For flipping steak without piercing"

- item: "Deep fryer or large pot"
  size: null
  essential: false
  notes: "For chips - or use oven for frozen chips"

- item: "Meat thermometer"
  size: null
  essential: false
  notes: "Takes guesswork out - 50°C for rare, 55°C medium-rare, 60°C medium"

# References
references:
- type: external_technique
  label: "Serious Eats Perfect Steak Guide"
  target: "https://www.seriouseats.com/how-to-cook-steak-reverse-sear-food-lab"

- type: external_similar
  label: "Billy Parisi Steak Frites"
  target: "https://www.billyparisi.com/steak-frites-recipe-lemon-herb-butter/"

# Recipe relationships
links:
  uses: ["herb-butter"]
  used_by: []

# Snap metadata
snap:
  motif: "Snap to Plan"
  microcopy: "Snap to Plan · Menu + shopping list · [QR]"
  placement: "recipe-footer"
---

## Raw Idea
Classic French bistro dish — pan-seared ribeye or sirloin rested with melting herb butter on top. Served with crispy twice-cooked chips or shortcut frozen fries. The herb butter does all the heavy lifting on flavor. Focus energy on generous pre-salting and a screaming hot pan for the crust. Simple green salad optional.

## Overview
The ultimate date night dish that looks impressive but is deceptively simple. A perfectly seared steak with herb butter melting over it, served with golden frites. The technique is all about temperature: hot pan for the steak, double-fry for the chips, room temp steak before cooking, and proper resting after.

## Why This Works
Pre-salting seasons deeply and starts to break down proteins on the surface, helping browning. Completely dry surface + screaming hot pan = Maillard reaction = deep brown crust. Room temperature steak cooks evenly. Resting lets muscle fibers relax and reabsorb juices - cutting too soon and they run out onto the plate. The herb butter melts over the hot steak, creating an instant pan sauce. Double-frying chips cooks them through on first fry, crisps on second fry.

## Key Technique
**Dry surface + smoking hot pan.** These two factors create the crust that makes restaurant steak restaurant steak. Pat steaks bone dry. Heat pan until it's actually smoking. Don't touch the steak once it hits the pan - let the crust form and it will release naturally when ready to flip.

## Shortcut
Buy good frozen oven chips (Belgian-style thick cut) and focus all energy on the steak. Or buy pre-made herb butter. Or cook steak in a non-stick pan (won't get as good a crust but easier). The core technique — salt early, dry surface, hot pan, rest before serving — stays the same.

## Variations
- **Different cuts**: Fillet for tenderness, T-bone for drama, flank for budget
- **Oven-finish**: Sear both sides, finish in 200°C oven for 5-7 mins for thicker steaks
- **Butter variations**: Blue cheese butter, anchovy butter, or simple garlic butter
- **Sauces**: Skip herb butter, make pan sauce with red wine and shallots
- **Peppercorn crust**: Press cracked black pepper into steak before searing

## Storage
- **Fridge**: Cooked steak keeps 3 days, but best eaten fresh. Reheat gently.
- **Freezer**: Not recommended - texture suffers
- **Counter**: Serve immediately

## Make Ahead
Pre-salt steaks up to 24 hours in advance (refrigerate uncovered - dry brining). Make herb butter weeks ahead and freeze. Do first fry of chips up to 2 hours ahead, final fry just before serving.

## Troubleshooting
- **No crust forming?** Pan not hot enough, or steak surface wet. Pat dry, heat pan longer.
- **Sticking to pan?** Too early to flip. Wait - it will release when crust forms.
- **Overcooked?** Steak was too cold when it hit pan, or pan too hot and outside burnt before inside cooked. Or didn't rest (carry-over cooking continues).
- **Grey not brown?** Pan not hot enough, or too much oil, or overcrowded pan.
- **Tough steak?** Wrong cut, overcooked, or didn't slice against the grain.
- **Chips soggy?** Oil not hot enough on second fry, or they weren't dry enough.

## Uses / Pairs With
Complete meal that pairs with:
- **Simple green salad** - Dressed with vinaigrette
- **Greek salad** - The tangy feta-melt version cuts through richness beautifully
- **Red wine** - Cabernet, Malbec, or Bordeaux
- **Bearnaise sauce** - Instead of herb butter for classic French

## Additional Notes
Steak thickness matters - aim for 2.5cm (1 inch) minimum. Thinner steaks overcook before crusting. Thicker steaks are easier to cook perfectly. Ribeye has more fat = more flavor but more expensive. Sirloin is leaner, cheaper, still excellent. Let steak come to room temp - cold steak cooks unevenly (burnt outside, raw inside). The resting time is when you do final fry on chips - perfect timing. If you're nervous about steak doneness, use a meat thermometer (pull at 50°C for rare, 55°C for medium-rare). Proper twice-cooked chips are worth it but frozen Belgian-style chips from the oven are honestly 85% as good. This dish costs £15-20 for two but tastes like a £40 bistro meal.

