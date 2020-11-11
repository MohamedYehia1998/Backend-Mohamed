CREATE TABLE instructors (
    id INT(100) PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    phone VARCHAR(255) UNIQUE NOT NULL,
    occupation VARCHAR(255) NOT NULL,
    position VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL
);

CREATE TABLE students (
    id INT(100) PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    education VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    phone VARCHAR(255) UNIQUE NOT NULL,
    occupation VARCHAR(255) NOT NULL
);

CREATE TABLE subjects (
    id INT(100) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE courses (
    id INT(100) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    instructor_id INT (100) NOT NULL
);

ALTER TABLE courses ADD CONSTRAINT instructor_id_fk FOREIGN KEY courses(instructor_id) REFERENCES instructors(id);

CREATE TABLE rounds (
    id INT(100) PRIMARY KEY AUTO_INCREMENT,
    start_date TIMESTAMP NOT NULL,
    course_id INT(100) NOT NULL,
    FOREIGN KEY (course_id) REFERENCES courses(id)
);

CREATE TABLE sessions (
    id INT(100) AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    round_id INT(100) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (round_id) REFERENCES rounds(id)
);

CREATE TABLE course_subject(
    course_id INT(100) NOT NULL,
    subject_id INT(100) NOT NULL,

    FOREIGN KEY (course_id) REFERENCES courses(id),
    FOREIGN KEY (subject_id) REFERENCES subjects(id)
);

CREATE TABLE student_round (
    student_id INT(100) NOT NULL,
    round_id INT(100) NOT NULL,

    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (round_id) REFERENCES rounds(id)
);

CREATE TABLE student_session (
    student_id INT(100) NOT NULL,
    session_id INT(100) NOT NULL,
    grade INT(100) NOT NULL,

    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (session_id) REFERENCES sessions(id)
);