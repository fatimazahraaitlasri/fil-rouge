create table if not exists properties
(
    id          int auto_increment primary key,
    name        varchar(255) not null,
    price       double       not null default 0,
    description text,
    image       varchar(255),
    city        varchar(255),
    address     varchar(255),
    country     varchar(255),
    guests      int                   default 1,
    owner_id    int,
    created_at  timestamp             default now(),
    foreign key (owner_id) references users (id) on delete cascade on update cascade
);

