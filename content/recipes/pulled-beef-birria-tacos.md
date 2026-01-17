---
# Schema version for future compatibility
schema: tbc.recipe.v1

# Core identification (maps to recipes table)
id: pulled-beef-birria-tacos
title: Pulled Beef Birria Tacos
type: dish
course: main
edition: v1
status: seed
hero: true

# Created timestamp
created: 2026-01-17

# Tags
tags:
- beef
- mexican
- spicy
- tacos
- birria
- slow-cooked
- comfort-food
- entertaining

# Yield
yield:
  serves: 6
  makes: "About 12-15 tacos"

# Timing
time:
  prep_min: 30
  cook_min: 210
  total_min: 240

# Difficulty
difficulty: Medium

# Structured ingredients
ingredients:
- amount: "1.5"
  unit: "kg"
  name: "beef chuck or short ribs"
  notes: "bone-in adds more flavor"
  sort_order: 1

- amount: "3"
  unit: null
  name: "dried guajillo chillies"
  notes: "or 2 chipotle + 1 ancho"
  sort_order: 2

- amount: "2"
  unit: null
  name: "dried ancho chillies"
  notes: null
  sort_order: 3

- amount: "1"
  unit: "large"
  name: "onion"
  notes: "quartered"
  sort_order: 4

- amount: "6"
  unit: "cloves"
  name: "garlic"
  notes: "whole, peeled"
  sort_order: 5

- amount: "2"
  unit: "cups"
  name: "beef stock"
  notes: "or chicken stock"
  sort_order: 6

- amount: "1"
  unit: "tbsp"
  name: "cumin seeds"
  notes: "toasted and ground, or 2 tsp ground"
  sort_order: 7

- amount: "1"
  unit: "tsp"
  name: "dried oregano"
  notes: "Mexican if possible"
  sort_order: 8

- amount: "1/2"
  unit: "tsp"
  name: "ground cinnamon"
  notes: null
  sort_order: 9

- amount: "3"
  unit: "tbsp"
  name: "apple cider vinegar"
  notes: null
  sort_order: 10

- amount: "2"
  unit: "tsp"
  name: "salt"
  notes: "plus more to taste"
  sort_order: 11

- amount: "12-15"
  unit: null
  name: "corn tortillas"
  notes: "small, for tacos"
  sort_order: 12

- amount: "1"
  unit: "cup"
  name: "quick pickled red onions"
  notes: null
  sort_order: 13

- amount: "1/2"
  unit: "cup"
  name: "mint garlic yoghurt"
  notes: "thinned with lime juice"
  sort_order: 14

- amount: "1"
  unit: "cup"
  name: "fresh coriander"
  notes: "roughly chopped"
  sort_order: 15

- amount: "2"
  unit: null
  name: "limes"
  notes: "cut into wedges"
  sort_order: 16

# Structured steps
steps:
- instruction: "Remove stems and seeds from dried chillies. Toast in dry pan over medium heat for 30 seconds per side until fragrant. Don't burn."
  timing_min: 2
  temp: "medium"
  technique: "toasting"
  visual_cue: "Chillies puffed slightly, darkened, intensely aromatic"
  notes: "Toasting is crucial for deep flavor"

- instruction: "Cover toasted chillies with boiling water and soak for 15 minutes until softened."
  timing_min: 15
  temp: null
  technique: "rehydrating"
  visual_cue: "Chillies soft and pliable"
  notes: "Save the soaking liquid - it has flavor"

- instruction: "In a blender, combine softened chillies (drain first), onion, garlic, 1 cup stock, cumin, oregano, cinnamon, vinegar, and salt. Blend until completely smooth."
  timing_min: 3
  temp: null
  technique: "blending"
  visual_cue: "Dark red, completely smooth sauce, no chunks"
  notes: "This is your adobo - the flavor base"

- instruction: "Season beef generously with salt. In a large Dutch oven or heavy pot, sear beef over high heat until browned on all sides."
  timing_min: 8
  temp: "high"
  technique: "searing"
  visual_cue: "Deep brown crust on all sides"
  notes: "Searing adds depth through Maillard reaction"

- instruction: "Pour adobo sauce over seared beef. Add remaining 1 cup stock. Bring to simmer, cover, and cook low and slow - 3 hours on stovetop or 3-4 hours at 150°C in oven."
  timing_min: 180
  temp: "low"
  technique: "braising"
  visual_cue: "Beef falling apart when prodded with fork, sauce thickened and dark"
  notes: "Can also use slow cooker on low for 6-8 hours"

- instruction: "Remove beef from pot. Shred with two forks, discarding any large fat pieces or bones. Skim fat from sauce."
  timing_min: 10
  temp: null
  technique: "shredding"
  visual_cue: "Beef in tender shreds, sauce glossy and dark red"
  notes: "Reserve sauce for dipping - this is the consommé"

- instruction: "Return shredded beef to pot with about half the sauce. Keep remaining sauce warm in a bowl for dipping."
  timing_min: 2
  temp: null
  technique: null
  visual_cue: "Beef coated in sauce, extra sauce on side"
  notes: "The dipping sauce (consommé) is key to birria tacos"

- instruction: "Warm tortillas in dry pan or directly over gas flame until soft and slightly charred."
  timing_min: 5
  temp: "medium-high"
  technique: null
  visual_cue: "Tortillas pliable, slight char marks"
  notes: "Warm tortillas are essential - cold ones crack"

- instruction: "Assemble tacos: Fill tortillas with beef, top with pickled onions, coriander, drizzle of yoghurt sauce. Serve with lime wedges and consommé for dipping."
  timing_min: 5
  temp: null
  technique: null
  visual_cue: "Messy, loaded tacos ready to dip"
  notes: "The 'wet taco' dip in consommé is the signature move"

# Equipment
equipment:
- item: "Dutch oven or heavy pot with lid"
  size: "4-6 litres"
  essential: true
  notes: "For braising beef"

- item: "High-speed blender"
  size: null
  essential: true
  notes: "For smooth adobo sauce"

- item: "Two forks"
  size: null
  essential: true
  notes: "For shredding beef"

# References
references:
- type: external_similar
  label: "RecipeTin Eats Birria Tacos"
  target: "https://www.recipetineats.com/birria-tacos/"

- type: external_technique
  label: "Serious Eats Mexican Braising"
  target: "https://www.seriouseats.com/mexican-braised-beef"

# Recipe relationships
links:
  uses: ["quick-pickled-red-onions", "mint-garlic-yoghurt"]
  used_by: []

# Snap metadata
snap:
  motif: "Snap to Plan"
  microcopy: "Snap to Plan · Menu + shopping list · [QR]"
  placement: "recipe-footer"
---

## Raw Idea
Slow-cooked beef in rich, spicy birria-style adobo sauce until it collapses and shreds. Served in warm tortillas with reduced consommé for dipping — the "wet taco" moment is the hook. Build tacos with fresh coriander, lime, and pickled onions for acid and crunch. The twist: mint-garlic-yoghurt as cooling element, thinned with lime to balance heat and richness. Comforting, messy, perfect winter food.

## Overview
The Mexican braise that became a social media sensation for good reason. Beef braised in dried chilli adobo until impossibly tender, served in tacos with the braising liquid as dipping sauce. The contrast of spicy, rich beef with cool yoghurt, bright pickled onions, and fresh herbs creates layers of flavor. It's involved but mostly hands-off time.

## Why This Works
Dried chillies (guajillo, ancho) provide complex heat and smoky depth that fresh chillies can't match. Long braising breaks down collagen in tough cuts into gelatin, creating tender, shreddable meat and silky sauce. The acidic adobo (vinegar, chillies) helps tenderize. Dipping tortillas in consommé before eating adds richness and prevents sogginess. The pickled onions cut through fat with acid. Yoghurt sauce cools the heat without killing flavor.

## Key Technique
**Toast and rehydrate dried chillies.** Toasting wakes up dormant flavors. Rehydrating makes them blendable. This two-step process is what gives birria its signature deep, complex heat. Skip it and you get flat, one-dimensional spice.

## Shortcut
Use store-bought birria seasoning paste (available at Mexican grocers) or make adobo with canned chipotle in adobo instead of dried chillies. Use slow cooker instead of oven. Buy pre-shredded Mexican-style cheese to skip the pickled onions if needed. The core technique — slow-cooked spiced beef — still works.

## Variations
- **Quesabirria**: Add cheese to tacos, fry them in consommé until crispy
- **Goat (traditional)**: Use goat instead of beef
- **Pork**: Works beautifully with pork shoulder
- **Pressure cooker**: 90 minutes at pressure instead of 3 hours braising
- **Extra spicy**: Add dried árbol chillies or cayenne to adobo

## Storage
- **Fridge**: Beef and sauce keep 4 days separately. Reheat gently.
- **Freezer**: 3 months - portion into bags. Sauce freezes well too.
- **Counter**: Not recommended

## Make Ahead
Make beef and sauce up to 3 days ahead - flavors improve. Shred when ready to serve. Make pickled onions days ahead. Yoghurt sauce can be made day before. Just warm tortillas and assemble when ready to eat.

## Troubleshooting
- **Sauce bitter?** Chillies burnt during toasting. Use less toasting time or fresh batch.
- **Beef tough?** Not cooked long enough. Keep going until it shreds easily.
- **Too spicy?** More yoghurt sauce, or use fewer chillies next time
- **Sauce thin?** Reduce it uncovered for 20-30 mins before serving
- **Not enough flavor?** More salt, or chillies too old/mild

## Uses / Pairs With
Complete meal that pairs with:
- **Rice and beans** - Classic sides
- **Mexican street corn** - Elote
- **Fresh pico de gallo** - Instead of pickled onions
- **Avocado** - Sliced or as guacamole
- **Beer** - Mexican lager or dark beer
- **Chips and salsa** - As appetizer while tacos cook

## Additional Notes
Birria is traditionally made with goat but beef is more accessible and equally delicious. Chuck roast is ideal - well-marbled, affordable, becomes tender with long cooking. Short ribs add richness from the bones but cost more. The consommé (dipping sauce) is non-negotiable - it's what makes these birria tacos not just beef tacos. You can strain it for a clearer liquid or leave it chunky. The mint-garlic-yoghurt is an unconventional addition (traditional birria uses Mexican crema) but the cooling mint works brilliantly against the warm spices. This recipe makes a lot - feeds 6 easily or 4 with leftovers. The beef reheats beautifully. Cost is about £20-25 for 6 people. Serves best family-style with everything in the middle - it's meant to be messy and interactive.

