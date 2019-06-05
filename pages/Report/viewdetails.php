<?php

	$query="SELECT tb_subject_schedule.id, tb_subject.subject_code, tb_subject.subject_name, tb_students.name as student_name, tb_semester.semester, tb_lecturer.name as lecturer_name, tb_classroom.classroom, CONCAT(tb_time.day,' ', tb_time.time) as date FROM tb_subject_schedule
	INNER JOIN tb_subject on tb_subject.id = tb_subject_schedule.subject_id
	INNER JOIN tb_semester on tb_semester.id = tb_subject.semester_id
	INNER JOIN tb_lecturer on tb_lecturer.id = tb_subject.lecturer_id
	INNER JOIN tb_time on tb_time.id = tb_subject_schedule.time_id
	INNER JOIN tb_classroom on tb_classroom.id = tb_subject_schedule.classroom_id
	INNER JOIN tb_students_schedule on tb_students_schedule.subject_id = tb_subject.id
	INNER JOIN tb_students on tb_students.id = tb_students_schedule.subject_id
	WHERE tb_subject.id = '1' AND tb_students.current_semester_id='4'";
?>
