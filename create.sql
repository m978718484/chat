#创建User表
drop table if exists chat_user;

create table chat_user(
	id int not null auto_increment,
    username varchar(50) not null,
    password char(32) not null,
    nickname varchar(50) not null,
    online bit(1) not null default 0,
    primary key(id)
)default charset=utf8;


