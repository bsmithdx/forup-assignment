# Brendan's Notes

## Workplan

### Frontend

- [x] Set up basic single page React app in blade template
- [ ] API Integration
    - [x] Create search component scaffolding (search bar, character grid, etc)
    - [ ] Create service to make API calls to backend (maybe use React Query?)
    - [ ] use react hooks to track state of query string and fetch results (using debounce function on string change)
    - [ ] pass query results as props to character grid and display dynamically
- [ ] Favorites
    - [ ] Create new Components to handle viewing list of existing favorite character lists with button to create new list by name
         - [ ] rendering view should query list of character lists and pass as props to new CharacterListGrid component
           - [ ] Display Name and total number of favorites in each row
          - [ ] add delete button to each row in CharacterListGrid and handle interaction
          - [ ] add link to open new individual CharacterList in character grid (hopefully re- use existing component in some way)
            - [ ] FavoriteCharacterGrid needs delete button (and interaction logic) vs new favorite button (refactor to pass as children?)
            - [ ] FavoriteCharacterGrid also needs to display total number of favorites outside of table
          - [ ] view needs button with functionality to create new CharacterList via POST request. Need to detect validation to handle known error if name already exists.
    - [ ] Add favorite functionality to search charactergrid
        - [ ] modal that displays checkbox list of all CharacterLists by name
        - [ ] modal needs submit button to send request to add character as favorite to all selected lists, then close modal
        -  Not sure how/if we can detect existing favorites in modal using existing schema choice. Will leave for now.
    - [ ] Handle navigation between Search and favorites functionality/views (probably just use state)
-  [ ] make sure components are styled and responsive

### Backend

- [ ] API Integration
    - [x] add service to wrap Guzzle client to send requests to 3rd party API
    - [x] Add routes and controller to request items from the 3rd party API and filter by name if applicable (limit to 100 if possible)
    - [ ] Marshal json results into array of Character DTOs for data integrity
      - [ ] CharacterDTO includes: Name, Gender, Culture, Alias, url (external id), and timestamp (either empty or can be used when marked as favorite)
    - [ ] Add tests of controller methods (mock API or not?)
    - [ ] Add test of CharacterDTO creation through static constructor method
- [ ] Favorites
    - [ ] Create a CharacterList model
        - [ ] should save name, timestamps, total number of favorites (either as data or derived), and serialized json from array of Character DTOs (need to add timestamp when favorited to DTO)
        -  (just saving snapshots of data and keeping the 3rd party API as the source of truth rather than trying to normalize into local database and keep local data synced with API)
    - [ ] Add routes and controller to list, create, update, and delete lists of characters (CharacterList)
        - [ ] List should return in alphabetical order by CharacterList name
        - [ ] Create logic needs validation to handle duplicate name conflict
        - [ ] Updating is how we add favorites (need to figure out how to handle saving to multiple lists with no Character resource?)
          - [ ] Updating should save favorites in order of favorited timestamp
    - [ ] Add tests of controller methods

# Project summary
We want to provide our users with the opportunity to search through a list of products/items/names, choose their favorites, and have them saved off for later use. This should be built with responsive design in mind and work functionally across all major browsers (Chrome/Firefox/Safari/Edge).
# Project requirements
## Part 1 – API Integration
- Create a search component that utilizes the API of your choice as its backend. Example APIs could be Marvel or the Lord of the Rings API but use whatever works best with the time allotted and is of interest to you.
- The user should be able to enter a search term and have results filtered automatically without having to hit a search button or press enter.
- When no search term has been provided, provide an unfiltered list of results
- We do not require pagination currently and if the API returns more than 100 results, limit your display to 100 results.
- Your backend code should consume your chosen external API and your frontend code should call your custom backend endpoint
- The results should be displayed in some form of grid below the search area
- Each item should include, at minimum, the name of the item.
- If the API also contains images, include the image with the name, if it does not, omit them
- Feel free to include any additional information you find relevant for the user to select between items
- When a new search term is provided, update the list of results
- This should be handled in Javascript without reloading the page
- It should use the same grid style and name/image requirements as the initial page load
## Part 2 – Favorites
- The user should be able to create multiple lists to save search results.
- If the chosen name already exists, an error message should be shown prompting the user to select a new name
- The user should be able to 'favorite’ any number of the search results from above and save them to one, or more, of their lists
- Provide a view of these lists.
- List should be displayed in alphabetical order
- Clicking on a list should display the favorites
- Ability to delete a list should also be provided in this view
- When viewing a list, favorites should be sorted by modified date
- Allow for a favorite to be deleted in this view
- Show the total number of items stored in each favorite list
- Data should be persisted in the storage engine of your choice (mysql, sqlite, redis, file, etc…) via calls to an API endpoint
- All page actions should be handled in Javascript without reloading the page
- An existing list can be deleted from the view
- Testing should be a part of your final submission
- There is no code coverage goal for this, you do not need 100% code coverage for both front and back end code
- Testing, however, is expected and tests that you do write, should pass.
# Technology choices
- All front-end javascript elements should be developed in a modern javascript framework of your choice (Vue, Angular, React, vanilla JS, etc…) and compiled using a front-end compiler of your choice (gulp, webpack, grunt, etc..). Use something you’re comfortable with, but be prepared to defend your choices.
- All back-end elements can be developed in a modern PHP framework of your choice (Laravel, Symfony, Yii, CakePHP, etc…). Be prepared to defend your choices with this as well.
# Expectations
- You ARE NOT expected to build out an entire webpage for this. EG: you don’t need fully formed navigation, footer, etc... However, your components should be properly styled and visually pleasing.
- You DO NOT need to build out any user authentication/login for this. You can safely assume that these components will be pulled into an application that already has authentication defined and that those checks will be handled higher up in the application.
- If you have docker experience, preference is to build this out with docker, however, this is not a requirement, nor does it have any impact on how the project will be evaluated should you choose not to build it using docker or do not have experience using docker.
- Implementation will be graded on execution, organization of code, maintainability, optimization, scalability, security, tests passing, and readability.
# Submission
Submit your work as a Git repository with instructions on how to build your implementation.




