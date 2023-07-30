# Web Languages and Technologies - LTW - FEUP - 2022/23

## Project Description

Website to streamline and manage trouble tickets effectively. The system enables users to submit, track, and resolve tickets promptly and efficiently. Additionally, the website have intuitive user interfaces and reporting functionalities to provide real-time insights into ticket status and performance metrics.

### Commands to Run the Project

```bash
git clone git@github.com:FEUP-LTW-2023/project-ltw12g02.git
cd project-ltw12g02
git checkout final-delivery-v2
sqlite3 database/trouble_tickets.db < database/trouble_tickets.sql
sqlite3 database/trouble_tickets.db < database/populate_tickets.sql
php -S localhost:9000
```

### Credentials
#### Admin
- Username: admin1
- Password: Admin@123

#### Agent
- Username: janesmith
- Password: Password@789

#### Client
- Username: johndoe
- Password: Password@123

#### Notes
- original password = password123; stored password = sha256(ltwpassword123)
- username needs to have at least 6 characters
- password needs to have at least 8 characters, 1 maiusc, 1 minusc, 1 number, 1 special char

### Features Implemented

- [x] Sign Up.
- [x] Login and Logout.
- [x] Edit user's profile.
- [x] Submit a new ticket (choosing a department and priority).
- [x] List and track tickets submitted.
- [X] Reply to inquiries.
- [ ] List and filter tickets (by department, status, priority or hashtag) - Agent.
- [X] Change the department, status  and priority of a ticket - Agent.
- [X] Assign a ticket to themselves or someone else - Agent.
- [ ] Edit ticket hashtags easily (just type hashtag to add (with autocomplete), and click to remove) - Agent. (almost done)
- [X] List all changes done to a ticket (status changes, assignments, edits) - Agent.
- [ ] Manage the FAQ and use an answer from the FAQ to answer a ticket - Agent. (almost done)
- [X] Upgrade a client to an agent or an admin - Admin.
- [X] Add new departments, statuses, and other relevant entities - Admin.
- [X] Assign agents to departments - Admin.

### Screenshots

- Login:
![Login](/Project/website_screenshots/login.png)

- Sign Up:
![Sign Up](/Project/website_screenshots/sign_up.png)

- Profile:
![Profile](/Project/website_screenshots/profile.png)

- Admin My Tickets:
![Admin My Tickets](/Project/website_screenshots/admin_myTickets.png)

- Admin Global Tickets:
![Admin Global Tickets](/Project/website_screenshots/admin_global_tickets.png)

- Admin FAQ:
![Admin FAQ](/Project/website_screenshots/admin_faq.png)

- Admin People Management:
![Admin People Management](/Project/website_screenshots/admin_people.png)

- Admin Departments Management:
![Admin Departments Management](/Project/website_screenshots/admin_departments.png)

- Admin Hashtags Management:
![Admin Hashtags Management](/Project/website_screenshots/admin_hashtags.png)

## Group Members

- Diogo Alexandre da Costa Melo Moreira da Fonte - up202004175@edu.fe.up.pt
- Francisco Pinto Tristão da Cunha Bettencourt - up202105288@edu.fe.up.pt
- Luís Carlos Novais Alves - up202108727@edu.fe.up.pt
