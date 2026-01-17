---
# Schema version for future compatibility
schema: tbc.recipe.v1

# Core identification (maps to recipes table)
id: nduja-yoghurt-bbq-chicken
title: Nduja Yoghurt BBQ Chicken
type: dish
course: main
edition: v1
status: seed
hero: true

# Created timestamp
created: 2026-01-17

# Tags
tags:
- chicken
- bbq
- grilled
- spicy
- summer
- marinated
- leftovers
- australian

# Yield
yield:
  serves: 4
  makes: null

# Timing
time:
  prep_min: 15
  cook_min: 45
  total_min: 60

# Difficulty
difficulty: Medium

# Structured ingredients
ingredients:
- amount: "1"
  unit: "whole"
  name: "chicken"
  notes: "1.5kg, spatchcocked, or 8 thighs/drumsticks"
  sort_order: 1

- amount: "1"
  unit: "cup"
  name: "mint garlic yoghurt"
  notes: "half for marinade, half for serving"
  sort_order: 2

- amount: "2"
  unit: "tbsp"
  name: "warm spice mix"
  notes: null
  sort_order: 3

- amount: "2"
  unit: "tbsp"
  name: "nduja"
  notes: "spicy Italian sausage paste"
  sort_order: 4

- amount: "2"
  unit: "tbsp"
  name: "olive oil"
  notes: null
  sort_order: 5

- amount: "1"
  unit: "tsp"
  name: "sea salt"
  notes: null
  sort_order: 6

- amount: "1"
  unit: null
  name: "lemon"
  notes: "halved for grilling"
  sort_order: 7

- amount: "to serve"
  unit: null
  name: "fresh herbs"
  notes: "coriander or parsley"
  sort_order: 8

# Structured steps
steps:
- instruction: "Spatchcock chicken: Place chicken breast-side down, cut along both sides of backbone with kitchen shears, remove backbone. Flip, press down hard on breastbone to flatten."
  timing_min: 5
  temp: null
  technique: "spatchcocking"
  visual_cue: "Chicken lies flat, butterflied, ready to marinate"
  notes: "Or ask butcher to spatchcock, or just use thighs/drumsticks"

- instruction: "In a bowl, mix 1/2 cup yoghurt, warm spice mix, nduja, olive oil, and salt into a marinade. Rub all over chicken, getting under skin where possible. Reserve remaining yoghurt for serving."
  timing_min: 5
  temp: null
  technique: null
  visual_cue: "Chicken completely coated in reddish marinade"
  notes: "Getting marinade under skin = more flavor"

- instruction: "Marinate for at least 2 hours in fridge, ideally 8 hours or overnight. Bring to room temp 30 mins before cooking."
  timing_min: 120
  temp: null
  technique: "marinating"
  visual_cue: null
  notes: "Room temp chicken cooks more evenly"

- instruction: "Preheat BBQ to medium-high, or preheat oven to 200°C if using oven method."
  timing_min: 10
  temp: "medium-high"
  technique: null
  visual_cue: null
  notes: "BBQ is preferred for smoky char flavor"

- instruction: "BBQ method: Place chicken skin-side up on indirect heat. Cover and cook for 35-40 mins. Flip, cook skin-side down for final 10 mins to crisp skin. Internal temp should reach 75°C."
  timing_min: 45
  temp: "medium-high"
  technique: "grilling"
  visual_cue: "Skin golden and charred, juices run clear, crispy edges"
  notes: "Indirect heat prevents burning while cooking through"

- instruction: "Alternative oven method: Place chicken on wire rack over baking tray. Roast at 200°C for 45-50 mins until skin is golden and crispy."
  timing_min: 50
  temp: "200°C"
  technique: "roasting"
  visual_cue: "Skin crispy, golden brown, fat rendered"
  notes: "Not as good as BBQ but still works well"

- instruction: "In last 5 minutes, add lemon halves to BBQ cut-side down until charred."
  timing_min: 5
  temp: null
  technique: null
  visual_cue: "Lemons caramelized and charred"
  notes: "Grilled lemons are sweeter and less harsh"

- instruction: "Rest chicken for 10 minutes before carving. Serve with reserved yoghurt sauce, charred lemons, fresh herbs."
  timing_min: 10
  temp: null
  technique: "resting"
  visual_cue: "Chicken glistening, juices settled"
  notes: "Save leftovers for chicken egg salad melt"

# Equipment
equipment:
- item: "Kitchen shears"
  size: null
  essential: false
  notes: "For spatchcocking - or ask butcher"

- item: "BBQ grill"
  size: null
  essential: false
  notes: "Preferred but oven works"

- item: "Meat thermometer"
  size: null
  essential: false
  notes: "Takes guesswork out - 75°C is done"

- item: "Wire rack and baking tray"
  size: null
  essential: false
  notes: "If using oven method"

# References
references:
- type: external_similar
  label: "Jamie Oliver Nduja Chicken"
  target: "https://www.jamieoliver.com/recipes/chicken/roast-chicken-thighs-and-nduja/"

# Recipe relationships
links:
  uses: ["mint-garlic-yoghurt", "warm-spice-mix"]
  used_by: ["chicken-egg-salad-melt"]

# Snap metadata
snap:
  motif: "Snap to Plan"
  microcopy: "Snap to Plan · Menu + shopping list · [QR]"
  placement: "recipe-footer"
---

## Raw Idea
Whole spatchcock chicken marinated in mint-garlic-yoghurt, warm spice mix, and nduja. Yoghurt tenderizes, nduja brings smoky heat, spices make it restaurant-quality. Marinate 8+ hours ideally, minimum 30 minutes if rushing. BBQ for char and flavor, oven as fallback. Thighs/drumsticks work too, breasts alone dry out. Serve with extra yoghurt and acid. Cook once, eat twice — leftovers become chicken egg salad melt.

## Overview
The Australian BBQ technique meets Middle Eastern and Italian flavors. Yoghurt-marinated chicken with warm spices and spicy nduja, grilled until charred and juicy. The yoghurt marinade tenderizes while the nduja adds complex heat. Spatchcocking means faster, more even cooking. This is the hero dish you make for Sunday dinner and eat in sandwiches all week.

## Why This Works
Yoghurt's lactic acid breaks down proteins, tenderizing chicken and helping it stay juicy. The fat in yoghurt helps spices stick and prevents burning. Nduja (spicy Italian spreadable salami) melts into the marinade, adding smoky, complex heat and umami. Warm spices (cumin, coriander, cinnamon) complement both the yoghurt and nduja. Spatchcocking exposes more surface area to heat and allows chicken to cook flat and even.

## Key Technique
**Spatchcock for even cooking.** Whole chicken roasted normally = dry breast, undercooked thighs. Spatchcocked chicken = everything cooks evenly, more crispy skin, faster cooking. It's worth the 5 minutes with kitchen shears.

## Shortcut
Use chicken thighs only (skip spatchcocking). Buy pre-mixed tandoori or shawarma spice blend instead of making warm spice mix. Use store-bought tzatziki thinned with lemon instead of mint-garlic-yoghurt. Skip nduja if you can't find it and add chili flakes. Still delicious.

## Variations
- **Less spicy**: Reduce or skip nduja, use sweet paprika
- **More heat**: Add fresh chillies or harissa to marinade
- **Lemon herb**: Skip nduja, add lemon zest and fresh herbs to yoghurt
- **Tandoori-style**: Use garam masala instead of warm spice mix, add turmeric
- **Jerk-style**: Use allspice, thyme, scotch bonnets instead of warm spices

## Storage
- **Fridge**: Cooked chicken keeps 4 days. Reheat gently or eat cold in sandwiches.
- **Freezer**: 3 months but texture suffers slightly
- **Counter**: Not recommended

## Make Ahead
Marinate up to 24 hours in advance (the longer the better). Cook fresh and eat over several days. Actually improves with marinating time.

## Troubleshooting
- **Chicken burning?** Heat too high or sugars in marinade caramelizing too fast. Use indirect heat, or lower temp.
- **Dry breast?** Overcooked. Pull at 75°C internal temp, or use dark meat only.
- **Skin not crispy?** Finish skin-side down directly over heat for last 5-10 mins.
- **Too spicy?** Less nduja next time. Serve with more yoghurt sauce.
- **Bland?** Not enough salt in marinade, or didn't marinate long enough.

## Uses / Pairs With
Serve with:
- **Greek salad** - The creamy feta-melt version
- **Rice pilaf** - Or couscous
- **Grilled vegetables** - Zucchini, capsicum, eggplant
- **Flatbread** - For scooping up sauce
- **Pickled onions** - For acid and crunch

Leftovers become:
- **Chicken egg salad melt** - The designated leftover dish
- **Wraps or pitas**
- **Rice bowls**
- **Pasta** - Shred into pasta with yoghurt sauce

## Additional Notes
Nduja is Italian spicy spreadable salami paste - find it at good delis or Italian grocers. A little goes a long way. If you can't find it, use chorizo paste or just add chili flakes. The mint-garlic-yoghurt doubles as both marinade and serving sauce - make sure to make enough. Spatchcocking looks intimidating but takes 5 minutes - YouTube it once and you'll never roast a whole chicken normally again. This is "cook once, eat twice" food - deliberately make extra for sandwiches and salads throughout the week. On the BBQ, use indirect heat (coals/burners on one side, chicken on the other) to prevent burning while it cooks through. Cost is about $12-15 for 4 people plus several days of lunches.

