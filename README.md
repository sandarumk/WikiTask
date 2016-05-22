#Wiki Task

This app will take the name of a Wikipedia Category as input and output a list of articles with their respective readability scores sorted from the elast readable to most.

####APIs used for the app
1. Wikipedia API: https://www.mediawiki.org/wiki/API:Main_page.
2. https://github.com/DaveChild/Text-Statistics (to calculate the readability score).

####Readability Score
The Readability accessing method is "Flesch reading ease" from "Flesch–Kincaid readability tests".
The formula is as follows:
```206.835 - 1.015 (total words/total sentences) - 84.6 (total syllables/ total words)```

*0 - Difficult to read
*100 - Easy to read

####Limitations
Only consider the first 50 articles in a category.

####Output
The output will will be as follows for the "Help" category:

![alt text](https://github.com/sandarumk/WikiTask/blob/master/wiki.PNG)
