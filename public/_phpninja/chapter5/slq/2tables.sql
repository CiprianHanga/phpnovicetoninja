# Adding authors to the database
# We specify the IDs so they are known when we add the jokes below.

INSERT INTO author SET
    id = 1,
    name = 'Kevin Yank',
    email = 'thatguy@kevinyank.com';

INSERT INTO author (id, name, email)
VALUES (2, 'Joan Smith', 'joan@example.com');

# Adding jokes to the database

INSERT INTO joke SET
    joketext = 'Why did the chicken cross the road? To get to the other side!',
    jokedate = '2012-04-01',
    authorid = 1;

INSERT INTO joke SET
    joketext = 'Knock-knock! Who\'s there? Boo! "Boo" who? Don\'t cry; it\'s only a joke!',
    jokedate = '2012-04-01',
    authorid = 1;

INSERT INTO joke SET
    joketext = 'A man walks into a bar. "Ouch."',
    jokedate = '2012-04-01',
    authorid = 2;
