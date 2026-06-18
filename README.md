# 🌟 PASTIMES Online Store — Premium Circular Fashion Marketplace

A high-end, responsive digital marketplace dedicated to curated thrift fashion, luxury second-hand garments, and the South African sneaker resale community. 

---

## 📺 Project Video Explanation & Walkthrough

Use the section below to insert your presentation or video walkthrough. This acts as the visual guide for the project setup and feature overview:

> [!TIP]
> ### 🔗 **[CLICK HERE TO WATCH THE VIDEO EXPLANATION](https://drive.google.com/file/d/1_UjBThPHhJKH2pt_uA3zOWqaFs_ML7kY/view?usp=drivesdk)**
> *(Replace `YOUR_YOUTUBE_VIDEO_LINK_HERE` with your actual video or presentation shareable link).*

---

## ✨ Core Features & Functionality

Pastimes is a full-featured PHP-MySQL dynamic application styled with **Tailwind CSS (Dark Slate Theme)** and animated with responsive client-side interactions.

### 1. Robust User Authentication (`login.php` & `register.php`)
- **Role-Based Membership**: Supports buyers, sellers, and system administrators.
- **Secure Architecture**: Implements standard `password_hash()` encryption for securely storing credentials.
- **Persistent Sessions**: Seamlessly tracks logged-in accounts across pages using secure browser sessions.
- **Dynamic Alerts**: Custom PHP/JS warning messages for failed logins or incorrect duplicate sign-ups.

### 2. High-Performance Digital Catalog (`shop.php` & `product.php`)
- **Curated Sneakers & Apparel**: A custom grid showcase designed to give high-end pieces a premium spotlight.
- **Flexible Filters**: Real-time server-side database querying for categories (**Menswear**, **Womenswear**, **Sneakers**) and specific brand tags.
- **Live Search**: Direct searching through available stock with a persistent query model.
- **Product Details Page**: Rich visual layout showcasing size, brand, detailed condition status, color details, and contact buttons to text the seller directly.

### 3. Sustainability Savings Dashboard (Eco-Thrift Action)
- Every single product tracks its estimated **environmental conservation metric** (e.g., water liters saved and CO2 emissions reduced).
- Encourages and highlights the environmental impact of circular fashion directly in our South African storefront metrics.

### 4. Interactive P2P Chat Messaging Engine (`messaging.php`)
- Buyers can message seller accounts directly from a product listing context.
- Organized chat sidebar displays conversations grouped by users.
- Live-updating chat transcript formatted with time stamps and visual left/right user placement.

### 5. Seamless Cart Integration (`cart.php` & `add_to_cart.php`)
- Standard multi-item shopping bag supporting quantity adjustments and removal.
- Calculates sub-totals automatically and appends local South African flat-rate door-to-door delivery fees (**R120.00 ZAR**).
- One-click validation and error toast notifications.

### 6. Administrative Privilege Suite (`profile.php` — Database Center)
We have designed a secure administration capability inside the database and codebase:
- **Administrative Account**: Accessible using credentials registered in the database (Default: `admin@pastimes.co.za`).
- **Global Store Telemetry**: Real-time server queries display the total verified members, active catalog listings, and ongoing peer message sessions.
- **Advanced Moderation Panel**:
  - **Catalog Control**: Admins can immediately delete and remove any active listing from the site entirely.
  - **User Directory Administration**: Admins can permanently deregister user profiles from the database, executing full cascade wipes of associated resources safely.

---

## 🛠️ Technology Stack & Architecture

- **Backend**: PHP 8+ custom MVC logic pattern.
- **Database**: MySQL Relational Database (Relational integrity links carts, messages, and products to user profiles).
- **Styling & Theme**: Modern tailwind CSS CDN, optimized utilizing custom dark-mode theme variables (e.g., dark borders, cosmic deep cards, sleek indigo neon typography).
- **Interactive UI Components**: Responsive JavaScript models and Lucide Vector Icons.

---

## 🚀 Local Installation Quickstart (Using XAMPP)

Follow these steps to deploy and run the website locally on your computer:

### Step 1: Start Server Services
1. Open the **XAMPP Control Panel**.
2. Click **Start** on the **Apache** web server.
3. Click **Start** on the **MySQL** database server.

### Step 2: Establish Database (`pastimes_db2`)
1. Click the **Admin** button next to MySQL on your XAMPP Control panel (or navigate to `http://localhost/phpmyadmin` in your browser).
2. Creating the new database:
   - Click **New** on the left panel.
   - Enter `pastimes_db2` as the database name.
   - Click **Create**.
3. Import the structure:
   - Click on your newly created `pastimes_db2` database in the left panel.
   - Navigate to the **Import** tab on the top horizontal menu.
   - Click **Choose File** and select the `/database.sql` file from this project folder.
   - Scroll down and click **Go** (or **Import** depending on your phpMyAdmin version).

### Step 3: Run the Application
1. Place the project folder containing the source files inside your XAMPP folder:
   - Path: `C:\xampp\htdocs\pastimes\`
2. Open your web browser and go to:
   - 🔗 **`http://localhost/pastimes/index.php`**

---

## 👥 Default Credentials for Testing

You can use the following default accounts populated inside `database.sql` to test the various membership levels:

| Role | Username / Email | Password | Access level |
| :--- | :--- | :--- | :--- |
| **Seller** | `thabo@example.co.za` | `password` | Can list drops, read received messages |
| **Admin** | `admin@pastimes.co.za` | `password` | **Full Admin Panel**: Moderate catalog, delete listings, wipe user database accounts |

---

## 📦 Database Schema Details (`database.sql`)

The MySQL schema operates with four highly interconnected relational entities:
1. `users`: Handles the persistent authentication profiles (`userId`, `fullName`, `email`, `passwordHash`, `role`).
2. `products`: Tracks circular apparel drops items (`productId`, `userId`, `name`, `description`, `price`, `size`, `category`, `brand`, `condition_status`, `colour`, `imageUrl`).
3. `carts`: Coordinates transient and local purchases linking shoppers to product listings (`cartId`, `userId`, `productId`, `quantity`).
4. `messages`: Feeds the real-time peer-to-peer visual messenger interface (`messageId`, `productId`, `senderId`, `receiverId`, `content`, `createdAt`).
