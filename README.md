#Wiki Task

This app will take the name of a Wikipedia Category as input and output a list of articles with their respective readability scores sorted from the elast readable to most.

####APIs used for the app
1. Wikipedia API: https://www.mediawiki.org/wiki/API:Main_page.
2. https://github.com/DaveChild/Text-Statistics (to calculate the readability score).
3. [httpful|http://phphttpclient.com/] (to http communications).

####Readability Score
The Readability accessing method is "Flesch reading ease" from "Flesch–Kincaid readability tests".
The formula is as follows:
```206.835 - 1.015 (total words/total sentences) - 84.6 (total syllables/ total words)```

0 - Difficult to read
100 - Easy to read

####Limitations
Only consider the first 50 articles in a category.

####Output
The output will will be as follows for the "Help" category:

![alt text](https://github.com/sandarumk/WikiTask/blob/master/wiki.PNG)

####Deployment
http://sandarumk.rf.gd/

####Test Cases
1. Category Name: "Physics" -> Shows 50 results in the table format
2. Category Name: "Help"    -> Shows 7 results in the table format
3. Category Name: "Sri Lanka" -> "No results found for the given category" message will be shown.
