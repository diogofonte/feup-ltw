-- FAQ
INSERT INTO faq (question, answer) VALUES
("What are the hours of operation?", "Our hours of operation are Monday through Friday, 9am to 5pm."), -- 0
("How can I reset my password?", "To reset your password, click the 'Forgot Password' link on the login page and follow the instructions."), -- 1
("How long does it take to resolve a ticket?", "The time it takes to resolve a ticket varies depending on the complexity of the issue. Our goal is to resolve all tickets as quickly and efficiently as possible."), -- 2
("What is the best way to contact customer support?", "The best way to contact customer support is by submitting a ticket through the website."), -- 3
("How do I know if my ticket has been assigned to an agent?", "You will receive an email notification when your ticket has been assigned to an agent."), -- 4
("What is the process for escalating a ticket?", "If you feel that your ticket is not being resolved in a timely manner, please reply to the ticket and request that it be escalated to a supervisor."), -- 5
("Can I update my ticket after it has been submitted?", "Yes, you can update your ticket at any time by logging into your account and navigating to the 'My Tickets' page."), -- 6
("What is the average response time for tickets?", "Our average response time for tickets is within 24 hours."), -- 7
("What should I do if I receive an error message while using the website?", "Please take a screenshot of the error message and submit a ticket to our customer support team."), -- 8
("How do I cancel a ticket?", "To cancel a ticket, please reply to the ticket and request that it be cancelled."), -- 9
("What is the policy on refunds?", "Our refund policy varies depending on the product or service in question. Please refer to the terms and conditions for more information."), -- 10
("How do I know if my ticket has been resolved?", "You will receive an email notification when your ticket has been marked as resolved."), -- 11
("What is the process for requesting a feature?", "To request a new feature, please submit a ticket to our customer support team."), -- 12
("How can I provide feedback on the website?", "We welcome all feedback on the website. Please submit a ticket to our customer support team with your comments or suggestions."), -- 13
("What is the policy on data privacy?", "We take data privacy very seriously. Please refer to our privacy policy for more information."), -- 14
("How do I update my account information?", "To update your account information, log in to your account and navigate to the 'My Account' page."), -- 15
("What is the process for deleting my account?", "To delete your account, please submit a ticket to our customer support team."), -- 16
("What is the policy on account sharing?", "Account sharing is strictly prohibited. Please refer to our terms and conditions for more information."), -- 17
("How can I track the status of my ticket?", "You can track the status of your ticket by logging into your account and navigating to the 'My Tickets' page."), -- 18
("What is the process for submitting a bug report?", "To submit a bug report, please submit a ticket to our customer support team and include a detailed description of the issue."); -- 19


-- Populate the department table
INSERT INTO department (name, color) VALUES
  ('Sales', '#FF0000'),
  ('Support', '#00FF00'),
  ('Finance', '#0000FF'),
  ('IT', '#FFFF00'),
  ('HR', '#FF00FF'),
  ('Marketing', '#00FFFF'),
  ('Operations', '#990000'),
  ('Research', '#309900'),
  ('Legal', '#010099'),
  ('Production', '#999100'),
  ('Quality Assurance', '#992099'),
  ('Customer Service', '#009999'),
  ('Engineering', '#999999'),
  ('Purchasing', '#660000'),
  ('Training', '#006600'),
  ('Logistics', '#000066'),
  ('Public Relations', '#666600'),
  ('Design', '#666666'),
  ('Consulting', '#006666'),
  ('Administration', '#660066');

-- Populate the user table
-- original password = password123; stored password = sha256(ltwpassword123)
-- username needs to have at least 6 characters
-- password needs to have at least 8 characters, 1 maiusc, 1 minusc, 1 number, 1 special char
INSERT INTO user (name, username, email, password, role, status) VALUES
  ('John Doe', 'johndoe', 'johndoe@example.com', 'b828b5165fcc62031bcc30e63468293b27c16fefd6245ba1b667e02d484fdef9', 'client', 'active'), -- Password@123
  ('Jane Smith', 'janesmith', 'janesmith@example.com', '79e779902b4958a2d63bd993401895234f432a99b8b43f932d2bcd7d0ae7575d', 'agent', 'active'), -- Password@789
  ('Agent 2', 'agent2', 'agent2@example.com', '79e779902b4958a2d63bd993401895234f432a99b8b43f932d2bcd7d0ae7575d', 'agent', 'active'), -- Password@789
  ('Admin', 'admin1', 'admin@example.com', '026e350c7c6da74961f32c79b9b0c50be1bb50fd8f8b63a2e8425082e2be35df', 'admin', 'active'), -- Admin@123
  ('Sarah Johnson', 'sarahj', 'sarahj@example.com', 'b828b5165fcc62031bcc30e63468293b27c16fefd6245ba1b667e02d484fdef9', 'client', 'active'), -- Password@123
  ('Robert Anderson', 'roberta', 'roberta@example.com', 'cf518f267044b594b7b67b3aef0e39696aee86ab27d32c4adc44fbbf6e2247aa', 'client', 'active'), -- Password@456
  ('Agent 3', 'agent3', 'agent3@example.com', '79e779902b4958a2d63bd993401895234f432a99b8b43f932d2bcd7d0ae7575d', 'agent', 'active'), -- Password@789
  ('Agent 4', 'agent4', 'agent4@example.com', '79e779902b4958a2d63bd993401895234f432a99b8b43f932d2bcd7d0ae7575d', 'agent', 'active'), -- Password@789
  ('Admin 2', 'admin2', 'admin2@example.com', '026e350c7c6da74961f32c79b9b0c50be1bb50fd8f8b63a2e8425082e2be35df', 'admin', 'active'), -- Admin@123
  ('Michael Smith', 'michaels', 'michaels@example.com', 'b828b5165fcc62031bcc30e63468293b27c16fefd6245ba1b667e02d484fdef9', 'client', 'active'), -- Password@123
  ('Emily Davis', 'emilyd', 'emilyd@example.com', 'cf518f267044b594b7b67b3aef0e39696aee86ab27d32c4adc44fbbf6e2247aa', 'client', 'active'), -- Password@456
  ('Agent 5', 'agent5', 'agent5@example.com', '79e779902b4958a2d63bd993401895234f432a99b8b43f932d2bcd7d0ae7575d', 'agent', 'active'), -- Password@789
  ('Agent 6', 'agent6', 'agent6@example.com', '79e779902b4958a2d63bd993401895234f432a99b8b43f932d2bcd7d0ae7575d', 'agent', 'active'), -- Password@789
  ('Admin 3', 'admin3', 'admin3@example.com', '026e350c7c6da74961f32c79b9b0c50be1bb50fd8f8b63a2e8425082e2be35df', 'admin', 'active'), -- Admin@123
  ('James Johnson', 'jamesj', 'jamesj@example.com', 'b828b5165fcc62031bcc30e63468293b27c16fefd6245ba1b667e02d484fdef9', 'client', 'active'), -- Password@123
  ('Linda Brown', 'lindab', 'lindab@example.com', 'cf518f267044b594b7b67b3aef0e39696aee86ab27d32c4adc44fbbf6e2247aa', 'client', 'active'), -- Password@456
  ('Agent 7', 'agent7', 'agent7@example.com', '79e779902b4958a2d63bd993401895234f432a99b8b43f932d2bcd7d0ae7575d', 'agent', 'active'), -- Password@789
  ('Agent 8', 'agent8', 'agent8@example.com', '79e779902b4958a2d63bd993401895234f432a99b8b43f932d2bcd7d0ae7575d', 'agent', 'active'), -- Password@789
  ('Admin 4', 'admin4', 'admin4@example.com', '026e350c7c6da74961f32c79b9b0c50be1bb50fd8f8b63a2e8425082e2be35df', 'admin', 'active'); -- Admin@123

-- Populate the agent_department table
INSERT INTO agent_department (agent_id, department_id) VALUES
  (3, 1),
  (3, 2),
  (4, 2),
  (7, 3),
  (7, 4),
  (8, 4),
  (11, 5),
  (11, 6),
  (12, 6),
  (15, 7),
  (15, 8),
  (16, 8),
  (19, 9),
  (19, 10),
  (20, 10),
  (3, 11),
  (3, 12),
  (4, 12),
  (7, 13),
  (7, 14);

-- Populate the hashtag table
INSERT INTO hashtag (name) VALUES
  ('urgent'),
  ('important'),
  ('sales'),
  ('billing'),
  ('technical'),
  ('inquiry'),
  ('complaint'),
  ('feedback'),
  ('request'),
  ('bug'),
  ('feature'),
  ('account'),
  ('security'),
  ('documentation'),
  ('marketing'),
  ('training'),
  ('performance'),
  ('meeting'),
  ('announcement'),
  ('survey');

-- Populate the ticket table
INSERT INTO ticket (user_id, agent_id, department_id, title, description, status, priority, creation_date, closing_date) VALUES
  (1, NULL, 1, 'Network Connectivity Issue', 'Unable to connect to the internet.', 'open', 'medium', datetime('now'), NULL),
  (2, NULL, 2, 'Billing Enquiry', 'Need clarification on my recent invoice.', 'open', 'low', datetime('now'), NULL),
  (1, 3, 2, 'Product Inquiry', 'Interested in knowing more about product XYZ.', 'assigned', 'high', datetime('now'), NULL),
  (3, 4, 5, 'Server Down', 'Our company website is inaccessible.', 'open', 'high', datetime('now'), NULL),
  (6, 7, 3, 'Password Reset', 'Forgot my account password.', 'assigned', 'medium', datetime('now'), NULL),
  (9, 8, 6, 'Campaign Feedback', 'Provide feedback on our recent marketing campaign.', 'open', 'low', datetime('now'), NULL),
  (11, 12, 11, 'Software Bug', 'Encountered a critical bug in the latest release.', 'open', 'high', datetime('now'), NULL),
  (13, 16, 7, 'Missing Shipment', 'My order has not been delivered yet.', 'assigned', 'medium', datetime('now'), NULL),
  (18, 20, 9, 'Legal Consultation', 'Require legal advice for a contract.', 'open', 'high', datetime('now'), NULL),
  (4, 7, 10, 'Quality Issue', 'Received a defective product.', 'open', 'medium', datetime('now'), NULL),
  (6, 8, 13, 'Training Request', 'Interested in attending a training session.', 'assigned', 'low', datetime('now'), NULL),
  (10, 11, 14, 'Logistics Enquiry', 'Need information about shipping options.', 'open', 'low', datetime('now'), NULL),
  (14, 15, 17, 'Meeting Schedule', 'Request to schedule a meeting.', 'open', 'medium', datetime('now'), NULL),
  (17, 19, 12, 'Marketing Strategy', 'Propose a new marketing strategy.', 'assigned', 'high', datetime('now'), NULL),
  (5, 8, 5, 'Email Phishing', 'Received a suspicious email asking for personal information.', 'open', 'high', datetime('now'), NULL),
  (8, 12, 1, 'Sales Enquiry', 'Inquire about pricing and product availability.', 'open', 'medium', datetime('now'), NULL),
  (9, 11, 3, 'Performance Issue', 'Experiencing slow system performance.', 'assigned', 'low', datetime('now'), NULL),
  (12, 15, 15, 'New Feature Request', 'Suggest a new feature for the application.', 'open', 'low', datetime('now'), NULL),
  (15, 16, 2, 'Account Lockout', 'Unable to access my account due to multiple failed login attempts.', 'open', 'high', datetime('now'), NULL),
  (19, 20, 16, 'Survey Response', 'Provide feedback on our recent survey.', 'assigned', 'medium', datetime('now'), NULL);

-- Populate the ticket_hashtag table
INSERT INTO ticket_hashtag (ticket_id, hashtag_id) VALUES
  (1, 1),
  (1, 2),
  (2, 3),
  (3, 4),
  (3, 5),
  (4, 6),
  (5, 7),
  (6, 8),
  (7, 9),
  (8, 10),
  (9, 11),
  (10, 12),
  (11, 13),
  (12, 14),
  (13, 15),
  (14, 16),
  (15, 17),
  (16, 18),
  (17, 19),
  (18, 20);

-- Populate the ticket_update table
INSERT INTO ticket_update (ticket_id, user_id, description, update_date) VALUES
  (1, 1, 'Investigating the network issue.', datetime('now')),
  (1, 3, 'Assigned ticket to Agent 1.', datetime('now')),
  (2, 2, 'Responded to billing enquiry.', datetime('now')),
  (3, 3, 'Contacted client regarding product inquiry.', datetime('now')),
  (4, 4, 'Identifying the cause of the server downtime.', datetime('now')),
  (4, 7, 'Assigned ticket to Agent 3.', datetime('now')),
  (5, 7, 'Assisting client with password reset.', datetime('now')),
  (6, 8, 'Reviewing and addressing feedback.', datetime('now')),
  (7, 11, 'Investigating and fixing the software bug.', datetime('now')),
  (8, 16, 'Checking the status of the shipment.', datetime('now')),
  (8, 19, 'Assigned ticket to Agent 9 for further investigation.', datetime('now')),
  (9, 20, 'Reviewing the legal documentation.', datetime('now')),
  (10, 7, 'Assessing the quality issue and providing a solution.', datetime('now')),
  (11, 8, 'Scheduled training session for the client.', datetime('now')),
  (12, 11, 'Providing details about shipping options.', datetime('now')),
  (13, 15, 'Confirmed meeting schedule with the client.', datetime('now')),
  (14, 19, 'Reviewing and considering the proposed marketing strategy.', datetime('now')),
  (15, 5, 'Investigating the email phishing incident.', datetime('now')),
  (16, 8, 'Responded to sales enquiry with pricing details.', datetime('now')),
  (17, 11, 'Analyzing and addressing the performance issue.', datetime('now')),
  (18, 12, 'Considering the new feature request.', datetime('now')),
  (19, 15, 'Assisting client with account recovery.', datetime('now')),
  (20, 20, 'Reviewing and analyzing survey responses.', datetime('now'));

-- Populate the ticket_message table
INSERT INTO ticket_message (ticket_id, user_id, message, message_date) VALUES
  (1, 1, 'I am unable to connect to the internet. Please assist.', datetime('2023-05-10 09:12:00')),
  (1, 3, 'I will look into the issue and get back to you shortly.', datetime('2023-05-10 10:30:00')),
  (2, 2, 'Thank you for contacting us. We will address your billing enquiry.', datetime('2023-05-11 14:20:00')),
  (3, 3, 'Hello! I can help you with your product inquiry.', datetime('2023-05-12 16:45:00')),
  (4, 4, 'Our team is working on resolving the server issue.', datetime('2023-05-13 11:05:00')),
  (5, 7, 'I can assist you with your password reset. Please provide your account details.', datetime('2023-05-14 13:40:00')),
  (6, 8, 'Thank you for your feedback. We will review it and take necessary action.', datetime('2023-05-15 08:55:00')),
  (7, 11, 'We will investigate the software bug and provide a fix.', datetime('2023-05-16 12:10:00')),
  (8, 16, 'We are checking the status of your shipment and will update you soon.', datetime('2023-05-17 15:30:00')),
  (9, 20, 'Our legal team is reviewing the documentation for your request.', datetime('2023-05-18 09:45:00')),
  (10, 7, 'We apologize for the quality issue. We will resolve it promptly.', datetime('2023-05-19 14:20:00')),
  (11, 8, 'We have scheduled a training session as per your request.', datetime('2023-05-20 11:05:00')),
  (12, 11, 'Here are the available shipping options.', datetime('2023-05-21 13:40:00')),
  (13, 15, 'We have confirmed the meeting schedule. See you there!', datetime('2023-05-22 08:55:00')),
  (14, 19, 'Thank you for your proposed marketing strategy. We will evaluate it.', datetime('2023-05-23 12:10:00')),
  (15, 5, 'We will investigate the email phishing incident. Do not share any personal information.', datetime('2023-05-24 15:30:00')),
  (16, 8, 'Here are the details of our products and pricing.', datetime('2023-05-25 09:45:00')),
  (17, 11, 'We are working to address the performance issue. Please bear with us.', datetime('2023-05-26 14:20:00')),
  (18, 12, 'Thank you for your feature request. We will consider it for future updates.', datetime('2023-05-27 11:05:00')),
  (19, 15, 'We will assist you in recovering your account. Please provide the necessary information.', datetime('2023-05-28 13:40:00')),
  (20, 20, 'Thank you for participating in the survey. Your feedback is valuable to us.', datetime('2023-05-29 08:55:00'));