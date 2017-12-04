# news-authenticator
News Authenticator Documentation

1. Setup
2. Description
3. Use case
4. Response
5. Technical workflow


1. Setup

- Install web server and PHP or use XAMPP (for Windows) or MAMP (for Mac) which is easier
- Create a domain name or use one that's already created
- Download this repository
- Assign your domain name to the root folder of this repository ('news-authenticator')
- In your browser type in your domain name and press enter

2. Description

News Authenticator connects to Wikipedia’s API and fetches the data from keyword(s) chosen by the user. In this particular example I have chosen to connect to Wikipedia’s API because it hosts millions of articles from many different fields so that most searches will fetch requested information.

The main idea behind this application is to fetch the data from chosen source and allow its user to see and authenticate it. Thus the target user will probably be a journalist, news reporter, an author, organization or company that has a need to validate received information.

In the future it might connect to different API’s which would allow its users to authenticate all sorts of information based on custom built algorithms. Those algorithms would for example crawl the internet to find common data patterns and occurrences thus providing its users more information that would help them make better informed decisions.

3. Use case

You can perform the search by submitting the keyword(s) in ‘Search Wikipedia’ input field. 

4. Response

Once the keyword(s) are submitted the user sees the article’s title and main extract below it. On the right hand side in the ‘Most Common Words’ section the user can see the breakdown of ten most common words used within the article along with the number representing its occurrences within it. Below that the user is shown ‘Authenticity Progress’ section which allow him to see what number of journalists have already authenticated this article/news item. He is also able to authenticate it by pressing the green button.

5. Technical workflow
At the start the main file ‘index.php’ calls ‘wikipediaQuery()’ method which by using cURL calls Wikipedia’s API and fetches the result data to the user. 

Also by using the same result it calls ‘mostCommonWords()’ method which strips and filters the main extract and shows ten most common word occurrences.

The user is then able to input chosen keyword(s) and once the form is submitted the two methods described above are run again but this time using AJAX to allow smoother user experience and quicker application performance.

The ‘Authenticity Progress’ logic uses bootstrap’s progress bar and is handled by JavaScript’s on(‘click’) method.

By clicking on the ‘Tests’ link from the menu the user is able to see and run unit tests which are stored in ‘tests.php’ file inside ‘Tests’ folder. The tests use SimpleTest PHP unit test framework.
