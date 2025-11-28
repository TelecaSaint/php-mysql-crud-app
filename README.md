# Spice Isle Tours 🌴

A responsive PHP/MySQL web application for managing tours, clients, and bookings for Grenada’s top tour company — Spice Isle Tours.

## 🚀 Features
- Add, view, and manage **clients**, **tours**, and **bookings**
- **Reports page** with tours sorted by fee and most-booked tours
- **Contact page** with message storage
- Fully **responsive design** using Bootstrap
- Organized folder structure with includes and assets

## 🧱 Technologies Used
- HTML, CSS (Bootstrap 5)
- PHP & MySQL
- JavaScript (optional enhancements)
- GitHub for version control

## 📂 File Structure

spice_isle_tours/
├─ index.php
├─ clients.php
├─ tours.php
├─ bookings.php
├─ reports.php
├─ about.php
├─ contact.php
│
├─ includes/
│ ├─ db.php
│ ├─ header.php
│ └─ footer.php
│
├─ css/
│ └─ style.css
├─ js/
│ └─ scripts.js
└─ images/



## ⚙️ Database Schema
- `client(client_id, name, email, age)`
- `tour(tour_id, name, duration, fee)`
- `booking(booking_id, client_id, tour_id)`
- `contact(id, name, email, message)`

## 🌐 Hosting
Can be hosted using:
- XAMPP (Localhost)
- 000webhost / InfinityFree (for PHP hosting)
- GitHub repository for version control

## ✨ Author
**Spice Isle Tours Project**  
Developed by Teleca Stlouis 
For Web Design Final Project, TAMCC
