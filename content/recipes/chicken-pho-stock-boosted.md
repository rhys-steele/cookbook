---
# Schema version for future compatibility
schema: tbc.recipe.v1

# Core identification (maps to recipes table)
id: chicken-pho-stock-boosted
title: Chicken Pho (Pho Ga) — Stock-Boosted
type: dish
course: main
edition: v1
status: seed
hero: false

# Created timestamp
created: 2026-01-17

# Tags
tags:
- pho
- vietnamese
- chicken
- noodles
- soup
- stock-based
- comfort-food
- weeknight

# Yield
yield:
  serves: 4
  makes: null

# Timing
time:
  prep_min: 20
  cook_min: 45
  total_min: 65

# Difficulty
difficulty: Medium

# Structured ingredients
ingredients:
- amount: "2"
  unit: "litres"
  name: "chicken stock"
  notes: "homemade preferred, or good quality store-bought"
  sort_order: 1

- amount: "400"
  unit: "g"
  name: "chicken breast or thigh"
  notes: "boneless, skinless"
  sort_order: 2

- amount: "1"
  unit: "large"
  name: "brown onion"
  notes: "halved, skin on for charring"
  sort_order: 3

- amount: "50"
  unit: "g"
  name: "fresh ginger"
  notes: "about 2 inch piece, sliced"
  sort_order: 4

- amount: "2"
  unit: null
  name: "star anise"
  notes: "whole"
  sort_order: 5

- amount: "1"
  unit: "stick"
  name: "cinnamon"
  notes: "about 3 inches"
  sort_order: 6

- amount: "1"
  unit: "tsp"
  name: "coriander seeds"
  notes: "whole"
  sort_order: 7

- amount: "3"
  unit: "tbsp"
  name: "fish sauce"
  notes: "plus more to taste"
  sort_order: 8

- amount: "1"
  unit: "tbsp"
  name: "sugar"
  notes: "white or palm sugar"
  sort_order: 9

- amount: "400"
  unit: "g"
  name: "fresh rice noodles"
  notes: "bánh phở, or 200g dried"
  sort_order: 10

- amount: "1"
  unit: "cup"
  name: "bean sprouts"
  notes: "fresh"
  sort_order: 11

- amount: "1"
  unit: "bunch"
  name: "fresh coriander"
  notes: "leaves and stems"
  sort_order: 12

- amount: "1"
  unit: "bunch"
  name: "fresh Thai basil"
  notes: "or regular basil"
  sort_order: 13

- amount: "1"
  unit: "bunch"
  name: "fresh mint"
  notes: null
  sort_order: 14

- amount: "2"
  unit: null
  name: "limes"
  notes: "cut into wedges"
  sort_order: 15

- amount: "2"
  unit: null
  name: "fresh red chillies"
  notes: "sliced"
  sort_order: 16

- amount: "1"
  unit: "cup"
  name: "purple cabbage"
  notes: "shredded (optional but adds great crunch)"
  sort_order: 17

- amount: "to taste"
  unit: null
  name: "hoisin sauce"
  notes: "for serving"
  sort_order: 18

- amount: "to taste"
  unit: null
  name: "sriracha"
  notes: "for serving"
  sort_order: 19

# Structured steps
steps:
- instruction: "Char the onion and ginger: Heat a dry pan over high heat. Place onion halves cut-side down and ginger slices in pan. Char until blackened and fragrant, about 3-4 minutes per side for onion."
  timing_min: 8
  temp: "high"
  technique: "charring"
  visual_cue: "Deep char marks, aromatic smoke, ginger edges blackened"
  notes: "This adds depth and complexity to the broth. Don't skip this step."

- instruction: "Toast the spices: In the same pan, add star anise, cinnamon stick, and coriander seeds. Toast for 1-2 minutes until fragrant."
  timing_min: 2
  temp: "medium"
  technique: "toasting"
  visual_cue: "Spices darkened slightly, kitchen smells amazing"
  notes: null

- instruction: "Build the broth: In a large pot, bring chicken stock to a simmer. Add charred onion and ginger, toasted spices, fish sauce, and sugar. Stir to dissolve sugar."
  timing_min: 5
  temp: "medium"
  technique: null
  visual_cue: "Gentle simmer, aromatic steam"
  notes: null

- instruction: "Poach the chicken: Add chicken to the simmering broth. Poach gently for 15-20 minutes until just cooked through."
  timing_min: 20
  temp: "low"
  technique: "poaching"
  visual_cue: "Chicken should reach 165°F internal temp, no longer pink inside"
  notes: "Don't boil - gentle simmer keeps chicken tender"

- instruction: "Remove chicken from broth, let cool slightly, then slice or shred. Keep broth simmering gently while you prep."
  timing_min: 5
  temp: null
  technique: null
  visual_cue: "Chicken in thin slices or shreds, ready to add back"
  notes: null

- instruction: "Strain the broth through a fine-mesh sieve to remove aromatics and spices. Return clear broth to pot. Taste and adjust seasoning with more fish sauce or sugar if needed."
  timing_min: 3
  temp: null
  technique: "straining"
  visual_cue: "Clear(ish) golden broth, balanced salty-sweet flavor"
  notes: "The broth should taste slightly too salty on its own - noodles will balance it"

- instruction: "Prepare noodles according to package directions. If using fresh noodles, brief blanch in boiling water for 30 seconds. Drain well."
  timing_min: 3
  temp: null
  technique: null
  visual_cue: "Noodles tender but still have bite"
  notes: null

- instruction: "Assemble bowls: Divide noodles among serving bowls. Top with sliced chicken. Ladle hot broth over the top."
  timing_min: 2
  temp: null
  technique: null
  visual_cue: "Steaming bowls, chicken arranged nicely on top of noodles"
  notes: null

- instruction: "Serve immediately with garnishes on the side: bean sprouts, herbs, lime wedges, sliced chillies, shredded cabbage, hoisin, and sriracha. Let everyone customize their bowl."
  timing_min: 2
  temp: null
  technique: null
  visual_cue: "Colorful garnish platter, everyone builds their perfect bowl"
  notes: "The garnishes are not optional - they're essential to authentic pho"

# Equipment
equipment:
- item: "Large stockpot"
  size: "4-6 litres"
  essential: true
  notes: "For simmering broth"

- item: "Cast iron pan or skillet"
  size: null
  essential: true
  notes: "For charring onion and ginger"

- item: "Fine-mesh sieve"
  size: null
  essential: true
  notes: "For straining broth"

- item: "Tongs"
  size: null
  essential: true
  notes: "For handling chicken and aromatics"

# References
references:
- type: external_similar
  label: "Andrea Nguyen's Chicken Pho"
  target: "https://www.vietworldkitchen.com/blog/2008/10/chicken-pho-recipe-pho-ga.html"

- type: external_technique
  label: "Serious Eats Pho Guide"
  target: "https://www.seriouseats.com/how-to-make-pho-bo-pho-ga-vietnamese-beef-noodle-soup"

# Recipe relationships
links:
  uses: ["chicken-stock"]
  used_by: []

# Snap metadata
snap:
  motif: "Snap to Plan"
  microcopy: "Snap to Plan · Menu + shopping list · [QR]"
  placement: "recipe-footer"
---

## Raw Idea
A "weeknight cheat" pho ga built off homemade chicken stock base, with traditional pho spice set. Char onion and ginger, toast whole spices, then combine with stock, fish sauce, and sugar to hit that classic pho balance. Using stock massively boosts depth and body but reduces the crystal-clear broth look — accept the trade-off. Garnish heavily: bean sprouts, herbs, lime, chilli, plus shredded purple cabbage for extra crunch and color.

## Overview
This is chicken pho for people who already keep homemade stock in the freezer. The stock gives you a serious head start on flavor and body, while traditional aromatics and spices create authentic pho character. Not as clear as restaurant pho, but deeper and more satisfying. Surprisingly light and healthy despite being incredibly flavorful.

## Why This Works
Starting with stock instead of water gives you gelatin, umami, and body without simmering bones for 6 hours. Charring the onion and ginger creates smoky depth through the Maillard reaction. Toasting whole spices (star anise, cinnamon, coriander) releases aromatic oils that infuse the broth. The balance of fish sauce (savory, salty), sugar (sweet, rounds out flavors), and lime (bright, acidic) creates the classic pho flavor profile. Gentle poaching keeps chicken tender.

## Key Technique
**Char, don't skip it.** Blackening the onion and ginger over direct heat adds a crucial smoky-sweet depth that you can't get any other way. It takes 8 minutes and makes the difference between "this tastes like soup" and "this tastes like pho."

## Shortcut
Use store-bought rotisserie chicken (just warm it in the broth), skip charring the aromatics, and use ground spices in a tea bag instead of whole spices. Or buy pho spice packets from Asian grocers. Won't be as complex but still tasty.

## Variations
- **Beef Pho (Pho Bo)**: Use beef stock, replace chicken with thinly sliced raw beef (pour hot broth over it to cook), add beef bones to the stock
- **Vegetarian**: Use vegetable stock, add mushrooms and tofu, skip fish sauce or use vegetarian fish sauce
- **Spicy**: Add a tablespoon of chili oil to the broth, or serve with more fresh chillies
- **Rich version**: Add a chicken carcass to the stock while building the broth for extra body

## Storage
- **Fridge**: Broth keeps 5 days, store separately from noodles and garnishes. Chicken keeps 3 days.
- **Freezer**: Broth freezes beautifully for 3 months. Don't freeze assembled pho.
- **Counter**: Serve immediately, doesn't hold

## Make Ahead
Make the broth up to 3 days ahead and refrigerate. Reheat when ready to serve. Poach chicken fresh or up to 1 day ahead. Prep garnishes up to 4 hours ahead. Cook noodles fresh - they don't hold well.

## Troubleshooting
- **Broth tastes weak?** Reduce it down by simmering uncovered to concentrate flavors, or add more fish sauce
- **Too salty?** Add more water or a pinch of sugar to balance
- **Cloudy broth?** That's normal with stock - if you want it clearer, skim more aggressively and don't let it boil hard
- **Chicken dry?** Overcooked. Poach at gentle simmer, not boil, and check temp at 15 minutes
- **Missing that pho flavor?** You probably didn't char the aromatics enough, or your spices are old

## Uses / Pairs With
This is a complete meal in a bowl. Pairs with Vietnamese iced coffee, fresh spring rolls as appetizer, or keep it simple and just enjoy the pho.

## Additional Notes
The garnish plate is essential, not optional - the interplay of hot broth with cool herbs, crunchy sprouts, and bright lime is what makes pho special. Don't skip the purple cabbage - it's not traditional but adds great texture and color. If you can't find Thai basil, regular basil works fine. Fresh rice noodles are worth seeking out at Asian markets, but dried work well too. This is one of those recipes where having homemade stock in the freezer makes you look like a hero for relatively little actual work.

