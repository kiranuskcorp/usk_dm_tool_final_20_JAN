<?php
class SqlConstants {
	static $allSelect = array (
			
			
			"supportTrackerSelect" => "SELECT s.*,te.name as trainee_name,e.name as employee_name FROM support_tracker s,trainee te,employee e WHERE s.support_by=e.id AND s.support_to=te.id order by s.id desc",
			"supportTrackerInsert" => "INSERT INTO support_tracker(support_by, support_to, date,hours, description) VALUES (?,?,?,?,?)",
			"supportTrackerDelete" => "UPDATE technology set  active_flag=1 WHERE id = ?",
			"supportTrackerAdd" => "UPDATE technology set  active_flag=1 WHERE id = ?",
			"supportTrackerUpdate" => "UPDATE technology set name = ?,  updated_date =?, description =? WHERE id = ?",
			"supportTrackerSelectById" => "SELECT * FROM technology where id = ?",
				
			
			
			"technologySelect" => "SELECT * FROM technology where active_flag=0 ORDER BY name asc",
			"technologyInsert" => "INSERT INTO technology (name,created_date,description) values(?, ?,?)",
			"technologyDelete" => "UPDATE technology set  active_flag=1 WHERE id = ?",
			"technologyUpdate" => "UPDATE technology set name = ?,  updated_date =?, description =? WHERE id = ?",
			"technologySelectById" => "SELECT * FROM technology where id = ?",
			
			"trainerSelect" => "SELECT t.*,te.name as technology_name  FROM  trainer t, technology te WHERE t.technology_id= te.id order by t.name asc",
			"trainerInsert" => "INSERT INTO trainer (name, technology_id,phone,email,created_date,description) values(?, ?, ?,?,?,?)",
			"trainerDelete" => "DELETE FROM trainer  WHERE id = ?",
			"trainerUpdate" => "UPDATE trainer set name=?, technology_id=?,phone=?,email=?,updated_date=?,description=? WHERE id = ?",
			"trainerSelectById" => "SELECT * FROM trainer where id = ?",
			
			"employeeSelect" => "SELECT * FROM employee where active_flag=0 ORDER BY name asc",
			"employeeInsert" => "INSERT INTO employee (name,phone,email,role,base_salary,created_date,description) values(?, ?,?,?,?,?,?)",
			"employeeDelete" => "UPDATE employee set active_flag=1 WHERE id = ?",
			"employeeUpdate" => "UPDATE employee set name=?,phone=?,email=?,role=?,base_salary=?,updated_date=?,description=? WHERE id = ?",
			"employeeSelectById" => "SELECT * FROM employee where id = ?",
			
			"resumeSelect" => "SELECT r.*,tr.name as trainee_name,t.name as technology_name,e.name as employee_name
			FROM resume r,trainee tr,technology t,employee e
			WHERE r.trainee_id=tr.id AND r.technology_id=t.id AND r.created_by=e.id ORDER BY r.id desc",
			"resumeInsert" => "INSERT INTO resume (trainee_id,technology_id,created_by,status,attachment,filename,description) values(?, ?, ?,?,?,?,?)",
			"resumeDelete" => "DELETE FROM resume  WHERE id = ?",
			"reesumeUpdate" => "UPDATE resume set trainee_id=?,technology_id=?,created_by=?,status=?,attachment=?,filename=?,description=?WHERE id = ?",
			"resumeSelectById" => "SELECT * FROM resume where id = ?",
			
			"traineeSelect" => "SELECT tr.*, cl.name as client_name, te.name as technology_name
			FROM trainee tr, client cl, technology te
			WHERE tr.active_flag=0 AND tr.client_id = cl.id  and tr.technology_id = te.id order by tr.name asc",
			"traineeInsert" => "INSERT INTO trainee (name, email,alternate_phone,client_id,skype_id,timezone,batch_id,created_date,description,phone,trainee_fee_status,technology_id) values(?,?,?, ?,?,?,?,?,?,?,?,?)",
			"traineeDelete" => "UPDATE trainee  set active_flag=1  WHERE id = ?",
			"traineeUpdate" => "UPDATE trainee set name=?, email=?,alternate_phone=?,client_id=?,skype_id=?,timezone=?,batch_id=?,updated_date=?,description=?,phone=?,trainee_fee_status=?,technology_id=? WHERE id = ?",
			"traineeSelectById" => "SELECT * FROM trainee where id = ?",
			"traineeSelectByBatchId" => "SELECT * FROM trainee where batch_id = ?",
			
			"clientSelect" => "select c.*, group_concat(co.poc) AS pocs,group_concat(co.phone) AS phone,group_concat(co.email) AS email from client c, contact co where c.id= co.client_id AND c.active_flag=0  Group By co.client_id ORDER BY name asc",
			"clientInsert" => "INSERT INTO client (name, address,created_date,description) values(?, ?, ?,?)",
			"clientDelete" => "UPDATE client set active_flag=1   WHERE id = ?",
			"clientUpdate" => "UPDATE client set name=?, address=?,updated_date=?,description=? WHERE id = ?",
			"clientSelectById" => "SELECT * FROM client where id = ?",
			
			"contactSelect" => "SELECT * FROM contact ORDER BY id DESC",
			"contactInsert" => "INSERT INTO contact (client_id,poc,email,phone,created_date,description) values(?,?,?,?,?,?)",
			"contactDelete" => "DELETE FROM contact  WHERE id = ?",
			"contactUpdate" => "UPDATE contact set client_id=?,poc=?,email=?,phone=?,updated_date=?,description=? WHERE id = ?",
			"contactSelectById" => "SELECT * FROM contact where client_id = ?",
			
			"courseSelect" => "SELECT c.*,te.name as technology_name
			FROM  course c, technology te WHERE c.active_flag=0 AND c.technology_id= te.id  order by te.name asc",
			"courseInsert" => "INSERT INTO course (technology_id,name,est_hrs,created_date,description) values( ?, ?,?,?,?)",
			"courseDelete" => "UPDATE course set active_flag=1 WHERE id = ?",
			"courseUpdate" => "UPDATE course set technology_id=?,name=?,est_hrs=?,updated_date=?,description=? WHERE id = ?",
			"courseSelectById" => "SELECT * FROM course where id = ?",
			
			"batchSelect" => "SELECT b.*, t.name as technology_name, tr.name as trainer_name,tr.email as 'trainerEmail' FROM batch b, technology t, trainer tr WHERE b.active_flag=0 AND b.technology_id = t.id and b.trainer_id = tr.id order by b.id desc",
			"batchInsert" => "INSERT INTO batch (technology_id,trainer_id,start_date,end_date,duration,status,created_date,description,time) values( ?,?,?,?,?,?,?,?,?)",
			"batchDelete" => "UPDATE batch set active_flag=1 WHERE id = ?",
			"batchUpdate" => "UPDATE batch set  technology_id=?,trainer_id=?,start_date=?,end_date=?,duration=?,status=?,updated_date=?,description=?,time=? WHERE id = ?",
			"batchSelectById" => "SELECT * FROM batch where id = ?",
			
			"todoSelect" => "SELECT t.*, e.name as employee_name  FROM todo t, employee e  WHERE t.assigned_to= e.id AND t.active_flag=0 order by t.status desc",
			"todoInsert" => "INSERT INTO todo (category, status, assigned_to,estimated_time,created_date,description) values(?,?,?,?,?,?)",
			"todoDelete" => "UPDATE todo set active_flag=1  WHERE id = ?",
			"todoUpdate" => "UPDATE todo set  category=?,status=?,assigned_to=?,estimated_time=?,updated_date=?,description=? WHERE id = ?",
			"todoSelectById" => "SELECT * FROM todo where id = ?",
			
			"interviewSelect" => "SELECT i.*, c.name as client_name, tr.name as trainee_name,tech.name as technology,e.name as employee_name FROM interview i, client c, trainee tr,employee e,technology tech WHERE i.client_id = c.id and i.trainee_id = tr.id and i.assisted_by=e.id AND tr.technology_id = tech.id order by i.date desc",
			"interviewInsert" => "INSERT INTO interview ( trainee_id, assisted_by, client_id, interviewer, time, status, created_date, description, date) values(?, ?,?,?,?,?,?,?,?)",
			"interviewDelete" => "DELETE FROM interview  WHERE id = ?",
			"interviewUpdate" => "UPDATE interview set  trainee_id=?, assisted_by=?, client_id=?, interviewer=?, time=?, status=?,  updated_date=?, description=?, date=? WHERE id = ?",
			"interviewSelectById" => "SELECT * FROM interview where id = ?",
			
			"questionSelect" => "SELECT q.*, i.interviewer as interview_name FROM question q, interview i WHERE q.interview_id= i.id order by q.id desc",
			"questionInsert" => "INSERT INTO question ( interview_id, question, answers, created_date, description) values(?, ?, ?,?,?)",
			"questionDelete" => "DELETE FROM question  WHERE id = ?",
			"questionUpdate" => "UPDATE question set  interview_id=?,question=?,answers=?,updated_date=?,description=? WHERE id = ?",
			"questionSelectById" => "SELECT * FROM question where id = ?",
			
			"supportSelect" => "SELECT s.*,tr.name as trainee_name,e.name as employee_name FROM support s,trainee tr,employee e WHERE s.trainee_id=tr.id AND s.supported_by=e.id order by s.start_date asc",
			"supportInsert" => "INSERT INTO support ( trainee_id, supported_by, start_date, end_date, allotted_time, end_client, status, technology_used, created_date, description) values(?, ?,?,?,?,?,?,?,?,?)",
			"supportDelete" => "DELETE FROM support  WHERE id = ?",
			"supportUpdate" => "UPDATE support set  trainee_id=?,supported_by=?,start_date=?,end_date=?,allotted_time=?,end_client=?,status=?,technology_used=?,updated_date=?,description=? WHERE id = ?",
			"supportSelectById" => "SELECT * FROM support where id = ?",
			
			"usercredsselect" => "select * From user_creds where  username=? AND password=?",
			"usercredsInsert" => "INSERT INTO usercreds ( username, password, role) values(?,?,?)",
			"usercredsSelectById" => "SELECT * FROM usercreds where id = ?",
			"paymentPendingSelect" => "SELECT tr.name as 'name' , cl.name AS client ,'SUPPORT' as category , e.name AS assistedBy FROM support s , trainee tr ,client cl,employee e where s.status ='3 - Payment Pending' AND s.trainee_id=tr.id AND cl.id = tr.client_id AND s.supported_by = e.id UNION SELECT tr.name as 'name' ,cl.name AS client ,'INTERVIEW' as category , e.name AS assistedBy FROM interview i, trainee tr,client cl,
			 employee e where i.status ='5 - Payment Pending' AND i.trainee_id=tr.id AND cl.id = tr.client_id AND i.assisted_by = e.id UNION SELECT tr.name as 'name',cl.name AS client ,'Training' as category , tr.name AS assistedBy From trainee tr , batch b ,client cl where cl.id= tr.client_id AND b.id = tr.batch_id AND b.status IN (SELECT status from batch b where b.status = '3 - Payment Pending')",
			"batchdashboard" => "SELECT b.id as 'batchId' , tr.name as 'name', tech.name as 'technologyName',count(tre.id) as 'noofStudent' FROM batch b, technology tech , trainer tr,trainee tre where b.trainer_id = tr.id AND b.technology_id = tech.id AND tre.batch_id = b.id AND YEAR(b.start_date) = YEAR(CURRENT_DATE - INTERVAL ? MONTH) AND MONTH(b.start_date) = MONTH(CURRENT_DATE - INTERVAL ? MONTH) GROUP BY b.id",
			"supportdashboard" => "SELECT e.name AS 'supportedBy' , tra.name AS 'supportedTo' , s.`start_date` AS 'startedDate' ,s.`technology_used` AS 'technology' FROM support s,employee e,trainee tra,technology t where e.id = s.supported_by AND tra.id = s.`trainee_id` AND YEAR(s.start_date) = YEAR(CURRENT_DATE - INTERVAL ? MONTH) AND MONTH(s.start_date) = MONTH(CURRENT_DATE - INTERVAL ? MONTH) GROUP BY tra.name ",
			"interviewdashboard" => "SELECT i.`date` AS 'date', tra.name AS 'trainee', e.name AS 'supportedBy',i.status AS 'status' FROM `interview` i,employee e,trainee tra WHERE i.`trainee_id` = tra.id AND e.id = i.`assisted_by` AND YEAR(i.date) = YEAR(CURRENT_DATE - INTERVAL ? MONTH) AND MONTH(i.date) = MONTH(CURRENT_DATE - INTERVAL ? MONTH) GROUP BY tra.name ",
			"closeTrasactionClient" => "SELECT distinct c.name AS 'client' , count(tre.id) AS 'training' FROM `client` c,trainee tre where c.id = tre.client_id AND tre.`trainee_fee_status` = '5 - Payment Pending' GROUP BY c.name",
			"closeTrasactionSupport" => "select cl.name AS 'client',count(s.id) as 'support' from client cl, support s ,trainee tra where s.trainee_id = tra.id AND cl.id = tra.client_id AND s.status ='4 - Closed' AND YEAR(s.start_date) = YEAR(CURRENT_DATE - INTERVAL ? MONTH) AND MONTH(s.start_date) = MONTH(CURRENT_DATE - INTERVAL ? MONTH) GROUP BY cl.name",
			"closeTrasactionInterview" => "select cl.name AS 'client', count(i.id) as 'interview' from client cl, interview i ,trainee tra where i.trainee_id = tra.id AND cl.id = i.client_id AND i.status ='6 - Closed' AND YEAR(i.date) = YEAR(CURRENT_DATE - INTERVAL ? MONTH) AND MONTH(i.date) = MONTH(CURRENT_DATE - INTERVAL ? MONTH) GROUP BY cl.name",
			
			"batchdashboardYear" => "SELECT b.id as 'batchId' , tr.name as 'name', tech.name as 'technologyName',count(tre.id) as 'noofStudent' FROM batch b, technology tech , trainer tr,trainee tre where b.trainer_id = tr.id AND b.technology_id = tech.id AND tre.batch_id = b.id AND (b.start_date BETWEEN ? AND ?) GROUP BY b.id",
			"supportdashboardYear" => "SELECT e.name AS 'supportedBy' , tra.name AS 'supportedTo' , s.`start_date` AS 'startedDate' ,s.`technology_used` AS 'technology' FROM support s,employee e,trainee tra,technology t where e.id = s.supported_by AND tra.id = s.`trainee_id` AND (s.start_date BETWEEN ? AND ?) GROUP BY s.start_date,s.technology_used",
			"interviewdashboardYear" => "SELECT i.`date` AS 'date', tra.name AS 'trainee', e.name AS 'supportedBy',i.status AS 'status' FROM `interview` i,employee e,trainee tra WHERE i.`trainee_id` = tra.id AND e.id = i.`assisted_by` AND (i.date BETWEEN ? AND ?) GROUP BY tra.name ",
			"closeTrasactionClientYear" => "SELECT distinct c.name AS 'client' , count(tre.id) AS 'training' FROM `client` c,trainee tre where c.id = tre.client_id AND tre.`trainee_fee_status` = '5 - Payment Pending' GROUP BY c.name",
			"closeTrasactionSupportYear" => "select cl.name AS 'client',count(s.id) as 'support' from client cl, support s ,trainee tra where s.trainee_id = tra.id AND cl.id = tra.client_id AND s.status ='4 - Closed' AND (s.start_date BETWEEN ? AND ?) GROUP BY cl.name",
			"closeTrasactionInterviewYear" => "select cl.name AS 'client', count(i.id) as 'interview' from client cl, interview i ,trainee tra where i.trainee_id = tra.id AND cl.id = i.client_id AND i.status ='6 - Closed' AND (i.date BETWEEN ? AND ?) GROUP BY cl.name" 
	)
	;
	static $totalConstants = array (
			"todoConstants" => "1 - Not Started,2 - In Progress,3 - Completed,",
			"roleConstants" => "Program Analyst,Junior Developer,Resouce Co-ordinator, Contractor , Director",
			"timezoneConstants" => "IST,PST,EST,CST,MST",
			"supportConstants" => "1 - Not Started,2 - In Progress,3 - Payment Pending,4 - Closed,5 - Cancelled",
			"interviewconstants" => "1 - Not Started,2 - In Progress,3 - Cleared,4 - Rejected,5 - Payment Pending,6 - Closed,7 - Cancelled",
			"timeConstants" => "00:00,00:30,01:00,01:30,02:00,02:30,03:00,03:30,04:00,04:30,05:00,05:30,06:00,06:30,07:00,07:30,08:00,08:30,09:00,09:30,10:00,10:30,11:00,11:30,12:00,12:30,13:00,13:30,14:00,14:30,15:00,15:30,16:00,16:30,17:00,17:30,18:00,18:30,19:00,19:30,20:00,20:30,20:45,21:00,21:30,22:00,22:30,23:00,23:30",
			"feeStatusConstant" => "1 - Not Started,2 - In Progress,3 - Cleared,4 - Rejected,5 - Payment Pending,6 - Closed,7 - Cancelled" 
	);
	static $allSubjects = array (
			
			"batchSubject" => "Greetings on succesful completion of training",
			"batchBody" => "We have successful completed <Course Name> Training on <End Date>. The following is the list of the candidates who had completed their training with us. You can start Marketing For them.
									Please feel free to contact us for any kind of information.",
			"batchCC" => " ",
			"batchBCC" => " ",
			"batchfromConstants" => "prasad.uskcorp@gmail.com",
			"toConstants" => "sreenath1985@gmail.com",
		
	);
}
?>
