# 🏥 Hospital Management System

A Web-Based Hospital Management System developed using **PHP, MySQL, and XAMPP**.
This system helps manage patients, doctors, appointments, billing, and reports efficiently.

---

## 🚀 Features

* 🔐 **Admin Login System**
* 👨‍⚕️ **Patient Management (CRUD)**
* 🏥 **Department & Doctor Management**
* 📅 **Appointment Scheduling**
* 💳 **Billing System**

  * Add billing
  * Mark payment as Paid / Pending
* 📊 **Dynamic Reports (JOIN Queries)**
* 📈 **Dashboard with Live Statistics**
* ⚡ **Trigger Implementation**

  * Logs deleted patients into audit table

---

## 🛠️ Technologies Used

* **Frontend:** HTML, CSS
* **Backend:** PHP
* **Database:** MySQL
* **Server:** XAMPP
* **Editor:** VS Code

---

## 🗄️ Database Tables

* `patients`
* `doctors`
* `departments`
* `appointments`
* `billing`
* `users`
* `deleted_patients_log` (trigger table)

---

## ⚡ Trigger Used

**Trigger Name:** `log_deleted_patient`

* Executes **BEFORE DELETE** on `patients`
* Stores deleted patient details in `deleted_patients_log`
* Maintains audit trail for data safety

---

## 📊 System Workflow

1. Add Patient
2. Add Appointment
3. Generate Billing
4. Update Payment Status
5. View Reports

---

## ▶️ How to Run the Project

1. Install **XAMPP**

2. Copy project folder into:

   C:\xampp\htdocs\hospital

3. Start:

   * Apache
   * MySQL

4. Open phpMyAdmin and:

   * Create database `hospital`
   * Import `hospital.sql`

5. Open browser:

   http://localhost/hospital

---

## 🔑 Default Login

* **Username:** admin
* **Password:** admin123

---

## 📌 Notes

* This is an academic project
* Designed for demonstration of DBMS concepts:

  * Normalization
  * Foreign Keys
  * JOIN Queries
  * Triggers

---

## 📸 Future Improvements

* Role-based login (Admin/Staff)
* Online deployment
* UI enhancements
* Report export (PDF/Excel)

---

## 👨‍💻 Author

Developed as part of a DBMS project.

---
