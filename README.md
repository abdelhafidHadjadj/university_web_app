## DataBase Design

# Database connected

# Tables created

Students:

- Columns: StudentID (Primary Key), FirstName, LastName, DateOfBirth, Email, DepartmentID (Foreign Key)
  Courses:
- Columns: CourseID (Primary Key), CourseName, ProfessorID (Foreign Key), DepartmentID (Foreign Key), CreditHours
  Professors:
- Columns: ProfessorID (Primary Key), FirstName, LastName, Email, DepartmentID (Foreign Key)
  Registrations:
- Columns: RegistrationID (Primary Key), StudentID (Foreign Key), CourseID (Foreign Key), RegistrationDate, Grade
  Departments:
- Columns: DepartmentID (Primary Key), DepartmentName, DepartmentHead, Location

# SQL Queries
