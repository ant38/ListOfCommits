# ListOfCommits

Little application that lists the commits of a GitHub repository.
A first view shows a summary of each commit and a second view shows the details of a commit.
The repository can be chosen.

## Approach to the project

### Choices

The 'model' folder contains the classes used for accessing the API and representing the data.
The 'view' folder contains the html files.
The files in the root folder accesses the model and show the corresponding view.

### Used libraries

* GitHub API : https://developer.github.com/v3/
* Bootstrap : https://getbootstrap.com/docs/3.3/

## Installation

Install PHP and Apache

## Next steps

* Add filters (author of the commit, date, ...)
* List all the commits of a repo (not only the 30 first ones)
* Show more information (e.g. modified lines of a file)
* ...
