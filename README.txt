CS 347-B
Team: LittleSchemers
Project: DuckFuck; a dating website for Stevens students, by Stevens students
Members: John Spicer, Mark Spaloss, Jeff Meli, Ankur Ramesh

Website hosted at duckfuck.cf
Users can signup, log in, edit their profile, add pictures, swipe through all current users, view all users that they matched with, and chat with any user that they matched with.
Things that need to be updated:
	CSS across the site.
	Adding user's name, bio, and other pictures to the swiping page.
	Replacing user's email with their name in the chat and match pages.

SQL schema:
"users" table, contains 6 columns. Column name/description followed by its type.
- first name "first" VARCHAR(255)
- last name "last" VARCHAR(255)
- "email" VARCHAR(255)
- password hash & salt "password" VARCHAR(255)
- activation code, or the character 'A' if the account is activated "activation" VARCHAR(255)
- timestamp of when the account was made "timestamp" TIMESTAMP