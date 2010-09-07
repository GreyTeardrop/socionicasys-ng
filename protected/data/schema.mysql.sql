CREATE TABLE IF NOT EXISTS tbl_news
(
	id INTEGER NOT NULL AUTO_INCREMENT,
	title VARCHAR(256) NOT NULL,
	text TEXT NOT NULL,
	post_time INTEGER NOT NULL,
	PRIMARY KEY (id)
);
CREATE TABLE IF NOT EXISTS tbl_user
(
	id INTEGER NOT NULL AUTO_INCREMENT,
	phpbb_id INTEGER NULL,
	username VARCHAR(128) NOT NULL,
	password VARCHAR(128) NULL,
	salt VARCHAR(128) NULL,
	PRIMARY KEY (id),
	UNIQUE KEY (phpbb_id)
);
