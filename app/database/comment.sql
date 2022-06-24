create table if not exists comments
(
    id          int auto_increment primary key,
    user_id     int  not null,
    property_id int  not null,
    content     text not null,
    created_at  datetime default now(),
    foreign key (user_id) references users (id) on delete cascade on update cascade,
    foreign key (property_id) references properties (id) on delete cascade on update cascade
);
