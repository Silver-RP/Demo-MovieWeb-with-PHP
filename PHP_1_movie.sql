create database php_phim;
drop database php_phim;
drop table movie_genres;
drop table movie_list;

use php_phim;
show tables;

SELECT *FROM movie_genres ;
SELECT *FROM movie_list ;
SELECT *FROM users ;
SELECT *FROM comments ;
SELECT * FROM movie_list LIMIT 10 OFFSET 1;

ALTER TABLE users ADD COLUMN roles VARCHAR(10) NOT NULL DEFAULT 'user';
ALTER TABLE movie_genres ADD COLUMN note VARCHAR(255) ;
ALTER TABLE movie_list ADD COLUMN description TEXT ;
ALTER TABLE comments ADD COLUMN status TINYINT(1) NOT NULL DEFAULT 0;
ALTER TABLE movie_list DROP COLUMN description;
ALTER TABLE comments DROP COLUMN hidden;

DELETE FROM php_phim.users WHERE id<=3;
DELETE FROM php_phim.comments ;
DELETE FROM php_phim.movie_genres WHERE id>20;
DELETE FROM php_phim.movie_list WHERE id>22;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usernames VARCHAR(50) NOT NULL,
    passwords VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phoneNumber VARCHAR(15),
    roles VARCHAR(50)
);

CREATE TABLE movie_genres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE movie_list (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    genre_id INT NOT NULL,
    views INT,
    FOREIGN KEY (genre_id) REFERENCES movie_genres(id)
);
CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    movie_id INT,
    content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO movie_genres (name) VALUES
( 'Hành động'),( 'Hài hước'),('Tình cảm'),('Tâm lí'),('Khoa học viễn tưởng'),
('Võ thuật'),('Giả tưởng'),('Học đường'),('Âm nhạc'),('Phiêu lưu'),
('Trùng sinh'),('Đam mỹ'),('Võ hiệp'),('Đời thường'),('Anime')
;

INSERT INTO users(usernames,passwords , email,phoneNumber,roles) values 
('user1', 'password1', 'user1@example.com', '1234567890', 'admin'),
('user2', 'password2', 'user2@example.com', '2345678901', 'editor'),
('user3', 'password3', 'user3@example.com', '3456789012', 'viewer');


SELECT id INTO @hanh_dong FROM movie_genres WHERE name = 'Hành động';
SELECT id INTO @hai_huoc FROM movie_genres WHERE name = 'Hài hước';
SELECT id INTO @tinh_cam FROM movie_genres WHERE name = 'Tình cảm';
SELECT id INTO @tam_li FROM movie_genres WHERE name = 'Tâm lí';
SELECT id INTO @khoa_hoc_vien_tuong FROM movie_genres WHERE name = 'Khoa học viễn tưởng';
SELECT id INTO @vo_thuat FROM movie_genres WHERE name = 'Võ thuật';
SELECT id INTO @gia_tuong FROM movie_genres WHERE name = 'Giả tưởng';
SELECT id INTO @hoc_duong FROM movie_genres WHERE name = 'Học đường';
SELECT id INTO @am_nhac FROM movie_genres WHERE name = 'Âm nhạc';
SELECT id INTO @phieu_luu FROM movie_genres WHERE name = 'Phiêu lưu';
SELECT id INTO @trung_sinh FROM movie_genres WHERE name = 'Trùng sinh';
SELECT id INTO @dam_my FROM movie_genres WHERE name = 'Đam mỹ';
SELECT id INTO @vo_hiep FROM movie_genres WHERE name = 'Võ hiệp';
SELECT id INTO @doi_thuong FROM movie_genres WHERE name = 'Đời thường';
SELECT id INTO @anime FROM movie_genres WHERE name = 'Anime';

INSERT INTO movie_list (name, image, genre_id, views) VALUES
('Lật mặt 7', 'latmat7.jpg', @tinh_cam, 1199000),
('Con nhóc mót chồng', 'connhot.webp', @tinh_cam, 55500),
('Đất rừng phương Nam', 'datrung.webp', @tinh_cam, 98800),
('Mai', 'nai.jpg', @tinh_cam, 1502600),
('Nhà bà Nữ', 'nhabanu.webp', @doi_thuong, 1241200),
('Cái giá của hạnh phúc', 'cai-gia-cua-hanh-phuc-poster.webp', @tinh_cam, 43200),
('Action Movie 1', 'Action_Movie.jpeg', @hanh_dong, 1000),
('Comedy Movie 1', 'Comedy_Movie.jpeg.jpg', @hai_huoc, 2000),
('Romantic Movie 1', 'Romantic_Movie .jpeg', @tinh_cam, 3000),
('Drama Movie 1', 'Drama_Movie.jpeg', @tam_li, 4000),
('Sci-Fi Movie 1', 'Sci-Fi_Movie.jpeg', @khoa_hoc_vien_tuong, 5000),
('Martial Arts Movie 1', 'Martial_Arts_Movie.webp', @vo_thuat, 6000),
('Fantasy Movie 1', 'Fantasy_Movie.jpeg', @gia_tuong, 7000),
('School Movie 1', 'School_Movie.jpeg', @hoc_duong, 8000),
('Music Movie 1', 'Music_Movie .jpeg', @am_nhac, 9000),
('Adventure Movie 1', 'Adventure_Movie.jpeg', @phieu_luu, 10000),
('Rebirth Movie 1', 'Rebirth_Movie.jpg', @trung_sinh, 11000),
('BL Movie 1', 'BL_Movie.jpeg', @dam_my, 12000),
('Wuxia Movie 1', 'Wuxia_Movie.jpeg', @vo_hiep, 13000),
('Slice of Life Movie 1', 'SliceofLifeMovie.jpg', @doi_thuong, 14000),
('Anime Movie 1', 'Anime_Movie.jpeg', @anime, 150000002)
;
