CREATE TABLE  `transcromic`.`transcription` (
`id` INT NOT NULL AUTO_INCREMENT ,
`url` VARCHAR( 128 ) NOT NULL ,
`title` TINYTEXT NULL DEFAULT NULL ,
`author` TINYTEXT NULL DEFAULT NULL ,
`transcription` TEXT NOT NULL ,
`valid` INT NOT NULL ,
`email` TINYTEXT NULL DEFAULT NULL ,
`message` TINYTEXT NULL DEFAULT NULL ,
PRIMARY KEY (  `url` ) ,
UNIQUE (
`id`
)
) ENGINE = MYISAM ;

INSERT INTO  `transcromic`.`transcription` (
`id` ,
`url` ,
`title` ,
`author` ,
`transcription` ,
`valid`,
`email`,
`message`
)
VALUES (
NULL ,  'http://www.liondogworks.com/fur-piled/en/322',  'Fur-Piled - Soundtracks and Come Back - 322',  'Arthur Rainbow',  'Rose: Look at it all...
Rose: The smell, the sight, the sounds. All of it part of my kingdom. Yes, that''s right.
Rose: MY KINGDOM! It feels soo good to say that. Being the owner of this makes all the difference.
Rose: *SIGH*',  '1','',''
);
