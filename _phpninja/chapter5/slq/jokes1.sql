# Code to create a simple joke table

CREATE TABLE joke (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    joketext TEXT,
    jokedate DATE NOT NULL
) DEFAULT CHARACTER SET utf8 ENGINE=INNODB;


# Adding jokes to the table

INSERT INTO joke SET
    joketext = 'Why did the chicken cross the road? To get to the other side!',
    jokedate = '2009-04-01';

INSERT INTO joke SET
    joketext = 'Something wanting to be funny. Not succeeding.',
    jokedate = '2009-04-01';