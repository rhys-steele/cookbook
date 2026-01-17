---
# Schema version for future compatibility
schema: tbc.recipe.v1

# Core identification (maps to recipes table)
id: chicken-egg-salad-melt
title: Chicken Egg Salad Melt
type: dish
course: lunch
edition: v1
status: seed
hero: false

# Created timestamp
created: 2026-01-17

# Tags
tags:
- sandwich
- chicken
- eggs
- comfort-food
- quick
- leftovers
- lunch
- melt

# Yield
yield:
  serves: 2
  makes: "2 sandwiches"

# Timing
time:
  prep_min: 15
  cook_min: 5
  total_min: 20

# Difficulty
difficulty: Easy

# Structured ingredients
ingredients:
- amount: "1.5"
  unit: "cups"
  name: "cooked chicken"
  notes: "shredded, ideally leftover nduja yoghurt BBQ chicken or rotisserie"
  sort_order: 1

- amount: "3"
  unit: null
  name: "eggs"
  notes: "hard-boiled, roughly chopped"
  sort_order: 2

- amount: "1/3"
  unit: "cup"
  name: "mayonnaise"
  notes: "Kewpie preferred for extra richness"
  sort_order: 3

- amount: "2"
  unit: "tsp"
  name: "Dijon mustard"
  notes: null
  sort_order: 4

- amount: "2"
  unit: "tbsp"
  name: "pickles"
  notes: "finely chopped (dill or bread & butter)"
  sort_order: 5

- amount: "1"
  unit: "tbsp"
  name: "jalapeños"
  notes: "finely chopped, from jar"
  sort_order: 6

- amount: "1"
  unit: "tsp"
  name: "hot sauce"
  notes: "Frank's RedHot preferred, optional"
  sort_order: 7

- amount: "to taste"
  unit: null
  name: "salt and black pepper"
  notes: null
  sort_order: 8

- amount: "4"
  unit: "slices"
  name: "sourdough bread"
  notes: "or good quality white/multigrain"
  sort_order: 9

- amount: "4"
  unit: "slices"
  name: "cheese"
  notes: "cheddar, provolone, or American for melting"
  sort_order: 10

- amount: "2"
  unit: "tbsp"
  name: "butter"
  notes: "for grilling"
  sort_order: 11

- amount: "to serve"
  unit: null
  name: "quick pickled red onions"
  notes: "optional finish"
  sort_order: 12

# Structured steps
steps:
- instruction: "Hard-boil eggs: Place eggs in pot, cover with cold water by 1 inch. Bring to boil, remove from heat, cover for 10 mins. Transfer to ice bath, peel when cool, chop roughly."
  timing_min: 12
  temp: null
  technique: "boiling"
  visual_cue: "Yolks set but still creamy, not grey around edges"
  notes: "Can do this ahead - boiled eggs keep 5 days in fridge"

- instruction: "In a bowl, combine shredded chicken, chopped eggs, mayo, mustard, pickles, jalapeños, and hot sauce (if using). Mix until evenly combined. Season with salt and pepper to taste."
  timing_min: 3
  temp: null
  technique: null
  visual_cue: "Creamy salad, everything evenly distributed, not dry"
  notes: "Should be saucy but not swimming in mayo"

- instruction: "Taste and adjust - more pickles for tang, more jalapeños for heat, more mustard for punch."
  timing_min: 1
  temp: null
  technique: null
  visual_cue: null
  notes: "The filling should taste slightly too strong on its own - bread will balance it"

- instruction: "Butter one side of each bread slice. Place two slices butter-side down. Top with cheese, then generous pile of chicken-egg salad, then more cheese, then remaining bread slices butter-side up."
  timing_min: 2
  temp: null
  technique: null
  visual_cue: "Sandwiches stacked high, cheese on both sides of filling"
  notes: "Cheese on both sides helps hold everything together when melted"

- instruction: "Heat a large pan over medium heat. Place sandwiches in pan, press down gently with spatula. Cook for 3-4 minutes until bottom is golden brown."
  timing_min: 4
  temp: "medium"
  technique: "grilling"
  visual_cue: "Bottom bread deep golden, cheese starting to melt"
  notes: "Don't rush - medium heat ensures cheese melts before bread burns"

- instruction: "Carefully flip sandwiches. Cook second side for 3-4 minutes, pressing gently, until golden and cheese is fully melted."
  timing_min: 4
  temp: "medium"
  technique: "grilling"
  visual_cue: "Both sides golden, cheese oozing out sides"
  notes: "If cheese isn't melting, cover pan with lid for last minute"

- instruction: "Remove from heat, let rest 1 minute before cutting in half. Top with pickled red onions if desired. Serve immediately."
  timing_min: 1
  temp: null
  technique: null
  visual_cue: "Hot, melty, gooey, golden perfection"
  notes: "Cut diagonally for presentation"

# Equipment
equipment:
- item: "Large mixing bowl"
  size: null
  essential: true
  notes: "For chicken-egg salad"

- item: "Large pan or griddle"
  size: null
  essential: true
  notes: "For grilling sandwiches - cast iron works great"

- item: "Spatula"
  size: null
  essential: true
  notes: "For pressing and flipping"

# References
references:
- type: external_similar
  label: "Serious Eats Best Egg Salad"
  target: "https://www.seriouseats.com/the-best-egg-salad-recipe"

# Recipe relationships
links:
  uses: ["nduja-yoghurt-bbq-chicken", "quick-pickled-red-onions"]
  used_by: []

# Snap metadata
snap:
  motif: "Snap to Plan"
  microcopy: "Snap to Plan · Menu + shopping list · [QR]"
  placement: "recipe-footer"
---

## Raw Idea
Diner-style comfort melt designed for leftover nduja yoghurt BBQ chicken (rotisserie chicken works too). Shred chicken, mix with chopped boiled eggs, Kewpie mayo, Dijon, then fold through pickles and jalapeños for crunch, heat, acid. Hit it with Frank's hot sauce if you want. Pile onto toasted sourdough with cheese, grill until molten. Finish with pickled red onions for extra brightness.

## Overview
The ultimate leftovers sandwich. Rich chicken-egg salad with tangy pickles and spicy jalapeños, pressed between sourdough and grilled until cheese melts and bread crisps. It's comfort food disguised as lunch. The nduja chicken leftovers make this extra special, but store-bought rotisserie works too.

## Why This Works
Eggs add richness and structure to the salad. Mayo binds everything and adds fat. Mustard cuts through richness with sharpness. Pickles and jalapeños add acid, crunch, and heat to prevent it from being heavy. The grilling transforms it from just a good sandwich to something special - hot, crispy, melty. Using cheese on both sides of the filling helps everything stick together and adds extra richness.

## Key Technique
**Don't skimp on the filling.** A thin, sad layer of chicken salad is disappointing. Pile it high - the bread and cheese will contain it when you press and grill. This should be messy, abundant, over-the-top.

## Shortcut
Buy rotisserie chicken instead of using leftovers. Buy pre-boiled eggs. Use regular mayo instead of Kewpie. Skip the pickled onions. Make it open-face instead of grilled (just pile on toast and eat). Still good, just less special.

## Variations
- **Classic egg salad melt**: Skip chicken, use 6 eggs instead
- **Tuna melt version**: Replace chicken with tinned tuna
- **Spicier**: Add more jalapeños, sriracha mayo, or pepper jack cheese
- **Herb version**: Add fresh dill, chives, or parsley to the salad
- **Reuben-style**: Add sauerkraut and use Swiss cheese

## Storage
- **Fridge**: Chicken-egg salad keeps 2 days. Don't assemble sandwiches ahead - make fresh when ready to eat.
- **Freezer**: Not recommended
- **Counter**: Serve immediately after grilling

## Make Ahead
Make the chicken-egg salad up to 1 day ahead and refrigerate. Assemble and grill sandwiches fresh - pre-assembled sandwiches get soggy.

## Troubleshooting
- **Salad too dry?** Add more mayo, tablespoon at a time
- **Too rich/heavy?** More pickles, more mustard, squeeze of lemon
- **Bread burning before cheese melts?** Heat too high. Use medium heat and be patient.
- **Salad falling out?** Too much filling (there's no such thing - just embrace the mess) or not enough cheese to bind it
- **Bland?** Needs salt, or more mustard/pickles/hot sauce

## Uses / Pairs With
Complete meal that pairs with:
- **Chips/crisps** - Classic combo
- **Simple green salad** - To balance richness
- **Pickles on the side** - More acid never hurts
- **Tomato soup** - Diner classic pairing

## Additional Notes
Kewpie mayo is Japanese mayo - richer, tangier, better than regular mayo. Find it at Asian grocers or good supermarkets. Worth seeking out. If your leftover nduja chicken is already spiced, you might not need hot sauce - taste as you go. The pickles and jalapeños are non-negotiable - they provide the acid and heat that make this more than just a rich chicken sandwich. This is "cook once, eat twice" food - make the nduja chicken on Sunday, eat this sandwich Tuesday. Pre-sliced cheese is fine, or grate your own. American cheese melts beautifully but cheddar or provolone have more flavor. This sandwich is best eaten immediately while cheese is still gooey. Cost is about £3 per sandwich if using leftovers.

