# Order Me

## About the Project

**OrderMe** is a web application designed to help restaurants manage their delivery personnel efficiently. The platform allows restaurants to register, add delivery drivers, and assign orders while providing real-time updates on delivery status and navigation support.

## Team

This project is developed by:

- **Mike** - Backend Development (PHP, SQL)
- **Alan** - Frontend Development (JavaScript, HTML)
- **Loris** - UI/UX Design (TailwindCSS)

Although each team member has a primary role, all three contribute across different aspects of the application.

## Features

- **Restaurant Registration**: Restaurants can sign up and manage delivery personnel.
- **Delivery Personnel Management**: Restaurants register delivery personnel via email, who receive login credentials.
- **Order Management**: Restaurants can create orders, specify delivery time, and list order items.
- **Delivery Assignment**: Orders are assigned to specific delivery personnel.
- **Status Updates**: Delivery personnel can update the order status (e.g., "Underway," "Delivered").
- **Live Map Navigation**: Delivery personnel can see the customer's address and navigate using an integrated map.

## Technical Specifications

### Backend

- Developed using **PHP**.
- Uses **Apache** with **mod\_rewrite** enabled to reroute traffic via `.htaccess`.
- Data is processed through controllers and displayed via views (MVC pattern).
- **Database credentials are configured in the file:** `/includes/config.php`

### Frontend

- Developed using **HTML**, **JavaScript**, and **TailwindCSS**.

### UI/UX

- Designed with **TailwindCSS** for a responsive and modern look.

## Setup & Installation

### Requirements

- Apache with **mod\_rewrite** enabled
- PHP installed
- Database (MySQL recommended)

### Installation Steps

1. Clone the repository:

   ```bash
   git clone https://github.com/MRN0op/OrderMe
   ```

2. Navigate to the project directory:

   ```bash
   cd order-me
   ```

3. Ensure Apache's mod\_rewrite is enabled:

   - Open Apache configuration and enable `mod_rewrite`
   - Restart Apache

4. Configure database connection in `/includes/config.php`.

5. Start the server and access the application via browser.

## Contribution

Contributions are welcome! Feel free to submit a pull request or open an issue.

## License

This project is licensed under the MIT License.

