-- Get rid of any old data by resetting the table
DROP TABLE IF EXISTS Song_T;
DROP TABLE IF EXISTS Artist_T;
CREATE TABLE Song_T(
	songID			int unsigned 	NOT NULL AUTO_INCREMENT,
	artistID		int	unsigned	NOT NULL,
	songTitle 		varchar(128) 	NOT NULL,
	yearReleased 	varchar(4) 		DEFAULT NULL,
	songURL 		varchar(128) 	DEFAULT NULL,
	PRIMARY KEY (songID)
) ENGINE=InnoDB;

CREATE TABLE Artist_T(
	artistID 		int unsigned 			NOT NULL AUTO_INCREMENT,
	artistName 		varchar(64) 	UNIQUE	NOT NULL,
	country 		varchar(50) 			DEFAULT NULL,
	artistDOB		date					DEFAULT NULL,
	PRIMARY KEY (artistID)
) ENGINE=InnoDB;

-- Add some sample data 
INSERT INTO Artist_T(artistName) 						VALUES ('Juan Demonio');
INSERT INTO Artist_T(artistName, country) 				VALUES ('Gorillaz', 'England');
INSERT INTO Artist_T(artistName, country, artistDOB)	VALUES ('Keith Ape', 'South Korea', '1993-12-25');

INSERT INTO Song_T(artistID, songTitle, yearReleased, songURL) VALUES (1, 'Es Cana', '1975', 'https://www.youtube.com/watch?v=25FkiuORUKA');
INSERT INTO Song_T(artistID, songTitle, yearReleased, songURL) VALUES (2, 'Feel Good Inc.', '2005', 'https://www.youtube.com/watch?v=H8Qp38qT-xI');
INSERT INTO Song_T(artistID, songTitle, yearReleased, songURL) VALUES (3, 'IT G MA Remix (ft. A$AP Ferg, Father, Dumbfoundead & Waka Flocka Flame)', '2015', 'https://www.youtube.com/watch?v=rz-_mstXfr0');