create table if not exists users
(
    id         int auto_increment primary key,
    name       varchar(255) not null,
    email      varchar(255) not null unique,
    password   varchar(255) not null,
    created_at datetime                      default now(),
    about      text,
    role       enum ('guest','host','admin') default 'guest',
    avatar     varchar(255)
)