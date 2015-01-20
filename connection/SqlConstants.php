<?php
class SqlConstants {
	static $allSelect = array(
			"technologySelect" => "SELECT * FROM technology ORDER BY name asc",
			"technologyInsert" => "INSERT INTO technology (name,created_date,description) values(?, ?,?)",
			"technologyDelete" => "DELETE FROM technology  WHERE id = ?",
			"technologyUpdate" => "UPDATE technology set name = ?,  updated_date =?, description =? WHERE id = ?",
			"technologySelectById" => "SELECT * FROM technology where id = ?",

			"trainerSelect" =>  "SELECT t.*,te.name as technology_name  FROM  trainer t, technology te WHERE t.technology_id= te.id order by t.name asc",
			"trainerInsert" => "INSERT INTO trainer (name, technology_id,phone,email,created_date,description) values(?, ?, ?,?,?,?)",
			"trainerDelete" => "DELETE FROM trainer  WHERE id = ?",
			"trainerUpdate" => "UPDATE trainer set name=?, technology_id=?,phone=?,email=?,updated_date=?,description=? WHERE id = ?",
			"trainerSelectById" => "SELECT * FROM trainer where id = ?",

			"employeeSelect" => "SELECT * FROM employee ORDER BY name asc",
			"employeeInsert" => "INSERT INTO employee (name,phone,email,role,base_salary,created_date,description) values(?, ?,?,?,?,?,?)",
			"employeeDelete" => "DELETE FROM employee  WHERE id = ?",
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
			WHERE tr.client_id = cl.id and tr.technology_id = te.id order by tr.name asc",
			"traineeInsert" => "INSERT INTO trainee (name, email,alternate_phone,client_id,skype_id,timezone,batch_id,created_date,description,phone,technology_id) values(?, ?, ?,?,?,?,?,?,?,?,?)",
			"traineeDelete" => "DELETE FROM trainee  WHERE id = ?",
			"traineeUpdate" => "UPDATE trainee set name=?, email=?,alternate_phone=?,client_id=?,skype_id=?,timezone=?,batch_id=?,updated_date=?,description=?,phone=?,technology_id=? WHERE id = ?",
			"traineeSelectById" => "SELECT * FROM trainee where id = ?",

			"clientSelect" => "SELECT * FROM client ORDER BY name asc",
			"clientInsert" => "INSERT INTO client (name, address,created_date,description) values(?, ?, ?,?)",
			"clientDelete" => "DELETE FROM client  WHERE id = ?",
			"clientUpdate" => "UPDATE client set name=?, address=?,updated_date=?,description=? WHERE id = ?",
			"clientSelectById" => "SELECT * FROM client where id = ?",

			"contactSelect" => "SELECT * FROM contact ORDER BY id DESC",
			"contactInsert" => "INSERT INTO contact (client_id,poc,email,phone,created_date,description) values(?,?,?,?,?,?)",
			"contactDelete" => "DELETE FROM contact  WHERE id = ?",
			"contactUpdate" => "UPDATE contact set client_id=?,poc=?,email=?,phone=?,updated_date=?,description=? WHERE id = ?",
			"contactSelectById" => "SELECT * FROM contact where client_id = ?",
 
			"courseSelect" => "SELECT c.*,te.name as technology_name
			FROM  course c, technology te WHERE c.technology_id= te.id order by te.name asc",
			"courseInsert" => "INSERT INTO course (technology_id,name,est_hrs,created_date,description) values( ?, ?,?,?,?)",
			"courseDelete" => "DELETE FROM course  WHERE id = ?",
			"courseUpdate" => "UPDATE course set technology_id=?,name=?,est_hrs=?,updated_date=?,description=? WHERE id = ?",
			"courseSelectById" => "SELECT * FROM course where id = ?",

			"batchSelect" => "SELECT b.*, t.name as technology_name, tr.name as trainer_name FROM batch b, technology t, trainer tr WHERE b.technology_id = t.id and b.trainer_id = tr.id order by b.id desc",
			"batchInsert" => "INSERT INTO batch (technology_id,trainer_id,start_date,end_date,duration,status,created_date,description,time) values( ?,?,?,?,?,?,?,?,?)",
			"batchDelete" => "DELETE FROM batch  WHERE id = ?",
			"batchUpdate" => "UPDATE batch set  technology_id=?,trainer_id=?,start_date=?,end_date=?,duration=?,status=?,updated_date=?,description=?,time=? WHERE id = ?",
			"batchSelectById" => "SELECT * FROM batch where id = ?",

			"todoSelect" => "SELECT t.*, e.name as employee_name  FROM todo t, employee e  WHERE t.assigned_to= e.id order by t.status desc",
			"todoInsert" => "INSERT INTO todo (category, status, assigned_to,estimated_time,created_date,description) values(?,?,?,?,?,?)",
			"todoDelete" => "DELETE FROM todo  WHERE id = ?",
			"todoUpdate" => "UPDATE todo set  category=?,status=?,assigned_to=?,estimated_time=?,updated_date=?,description=? WHERE id = ?",
			"todoSelectById" => "SELECT * FROM todo where id = ?",

			"interviewSelect" => "SELECT i.*, c.name as client_name, tr.name as trainee_name ,e.name as employee_name FROM interview i, client c, trainee tr,employee e  WHERE i.client_id = c.id and i.trainee_id = tr.id and i.assisted_by=e.id order by i.date desc",
			"interviewInsert" => "INSERT INTO interview ( trainee_id, assisted_by, client_id, interviewer, time, status, created_date, description, date) values(?, ?,?,?,?,?,?,?,?)",
			"interviewDelete" => "DELETE FROM interview  WHERE id = ?",
			"interviewUpdate" => "UPDATE interview set  trainee_id=?, assisted_by=?, client_id=?, interviewer=?, time=?, status=?,  updated_date=?, description=?, date=? WHERE id = ?",
			"interviewSelectById" => "SELECT * FROM interview where id = ?",

			"questionSelect" => "SELECT q.*, i.interviewer as interview_name FROM question q, interview i WHERE q.interview_id= i.id order by q.id desc",
			"questionInsert" => "INSERT INTO question ( interview_id, question, answers, created_date, description) values(?, ?, ?,?,?)",
			"questionDelete" => "DELETE FROM question  WHERE id = ?",
			"questionUpdate" => "UPDATE question set  interview_id=?,question=?,answers=?,updated_date=?,description=? WHERE id = ?",
			"questionSelectById" => "SELECT * FROM question where id = ?",

			"supportSelect" => "SELECT s.*,tr.name as trainee_name,e.name as employee_name FROM support s,trainee tr,employee e WHERE s.trainee_id=tr.id AND s.supported_by=e.id order by s.start_date desc",
			"supportInsert" => "INSERT INTO support ( trainee_id, supported_by, start_date, end_date, allotted_time, end_client, status, technology_used, created_date, description) values(?, ?,?,?,?,?,?,?,?,?)",
			"supportDelete" => "DELETE FROM support  WHERE id = ?",
			"supportUpdate" => "UPDATE support set  trainee_id=?,supported_by=?,start_date=?,end_date=?,allotted_time=?,end_client=?,status=?,technology_used=?,updated_date=?,description=? WHERE id = ?",
			"supportSelectById" => "SELECT * FROM support where id = ?" ,

			
			"usercredsselect" => "select * From user_creds where  username=? AND password=?",
			"usercredsInsert" => "INSERT INTO usercreds ( username, password, role) values(?,?,?)",
			"usercredsSelectById" => "SELECT * FROM usercreds where id = ?" ,
			
			
	)
	;
	static $totalConstants = array(
			"todoConstants" => "1 - Not Started,2 - In Progress,3 - Completed,",
			"roleConstants" => "Program Analyst,Junior Developer,Resouce Co-ordinator , Contractor , Director",
			"timezoneConstants" => "IST,PST,EST,CST,MST",
			"supportConstants" => "1 - Not Started,2 - In Progress,3 - Payment Pending,4 - Closed,5 - Cancelled,",
			"interviewconstants" =>"1 - Not Started,2 - In Progress,3 -Cleared,4 - Rejected,5 - Payment Pending,6 - Closed,7 - Cancelled,",
			"timeConstants" => "00:00,00:30,01:00,01:30,02:00,02:30,03:00,03:30,04:00,04:30,05:00,05:30,06:00,06:30,07:00,07:30,08:00,08:30,09:00,09:30,10:00,10:30,11:00,11:30,12:00,12:30,13:00,13:30,14:00,14:30,15:00,15:30,16:00,16:30,17:00,17:30,18:00,18:30,19:00,19:30,20:00,20:30,20:45,21:00,21:30,22:00,22:30,23:00,23:30"
	);
}
?>
