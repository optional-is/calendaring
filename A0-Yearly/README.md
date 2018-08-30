# Calendaring
## A0 Wall Calendar

There are a few parameters you can tweak when generating this wall poster. In the code you want to update it to the year you'd want printed. There is also a list of holidays, they are currently for Iceland, but it is easy to follow the format to translate and add your own. There is also a section for static birthday. This also outputs the old Icelandic months, you can remove/comment out that code if you want.

## Generation

To run this, simply type:

php A0-generator.php > poster.svg

This will create an SVG file of the wall poster. You can then convert that to a PDF and/or send it to the printer. In this intermediate step you can further tweak the design in a tool like Illustrator, Sketch or Inkscape.

## Size

The output is A0, which is actually very big, so you probably want to print this at A1. Since everything is a vector, it should scale down nicely.