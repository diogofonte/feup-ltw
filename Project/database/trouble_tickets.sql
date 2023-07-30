-- drops's

drop table if exists department;
drop table if exists user;
drop table if exists agent_department;
drop table if exists hashtag;
drop table if exists ticket;
drop table if exists task;
drop table if exists ticket_update;
drop table if exists faq;
drop table if exists ticket_message;

-- create's

create table department (
    id integer primary key autoincrement,
    name text not null,
    color integer not null -- in hex
);

create table user (
    id integer primary key autoincrement,
    name text not null,
    username text not null,
    email text not null,
    password text not null,
    photo text default "default.jpg",
    role text not null check (role in ('client', 'agent', 'admin')),
    status text not null check (status in ('active', 'inactive')) -- not needed, just an idea
);

create table agent_department (
    agent_id integer not null references user(id),
    department_id integer not null references department(id),
    primary key (agent_id, department_id)
);

create table hashtag (
    id integer primary key autoincrement,
    name text not null
);

create table ticket (
    id integer primary key autoincrement,
    user_id integer not null references user(id),
    agent_id integer references user(id) on delete set null, -- can be null if the ticket is not assigned to an agent yet
    department_id integer not null references department(id) on delete cascade,
    title text not null,
    description text not null,
    status text not null check (status in ('open', 'assigned', 'closed')),
    priority text not null check (priority in ('low', 'medium', 'high')),
    creation_date datetime not null,
    closing_date datetime
);

create table ticket_hashtag (
    ticket_id integer not null references ticket(id),
    hashtag_id integer not null references hashtag(id),
    primary key (ticket_id, hashtag_id)
);

create table ticket_update (
    id integer primary key autoincrement,
    ticket_id integer not null references ticket(id),
    user_id integer not null references user(id),    -- can be the client or the agent/admin
    description text not null,
    update_date datetime not null
);

create table ticket_message (
    id integer primary key autoincrement,
    ticket_id integer not null references ticket(id),
    user_id integer not null references user(id),    -- can be the client or the agent/admin
    message text not null,
    message_date datetime not null
);

create table faq (
    id integer primary key autoincrement,
    question text not null,
    answer text not null
);

-- TRIGERS

create trigger ticket_cascade_delete
before delete on department
for each row
begin
    delete from ticket where department_id = old.id;
end;

create trigger ticket_message_cascade_delete
before delete on ticket
for each row
begin
    delete from ticket_message where ticket_id = old.id;
end;

create trigger ticket_update_cascade_delete
before delete on ticket
for each row
begin
    delete from ticket_update where ticket_id = old.id;
end;

create trigger agent_department_cascade_delete
before delete on department
for each row
begin
    delete from agent_department where department_id = old.id;
end;