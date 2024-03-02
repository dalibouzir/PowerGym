@extends('dashboard')
@section('title', 'Power Gym - Feedback')
@section('content')
<!DOCTYPE html>
<header>
<title>Home</title>
    <style>@import url("https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900;1000&family=Roboto:wght@300;400;500;700&display=swap");

        *,
        *::before,
        *::after {
          box-sizing: border-box;
          padding: 0;
          margin: 0;
        }
        
        nav {
          user-select: none;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          -o-user-select: none;
        }
        
        nav ul,
        nav ul li {
          outline: 0;
        }
        
        nav ul li a {
          text-decoration: none;
        }
       p,h2{
        color:black;
       }

        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: "Nunito", sans-serif;
            background-color: #000; /* Black background */
        }

        main {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 100%;
            background-image: url('https://img.freepik.com/premium-photo/dark-gym-with-red-lights-black-background_876956-1225.jpg');
            background-size: cover;
            color: #fff; /* White text for contrast */
        }

        .content {
            display: flex;
            flex: 1; /* Take up all available space */
            padding: 20px;
        }

        .left-content, .right-content {
            flex: 1; /* Each takes half of the available space */
            display: flex;
            border-left: 5px solid rgba(255, 0, 0, 0.5); /* Subtle red hint on the left border */
            box-shadow: 0 2px 5px rgba(255, 0, 0, 0.2); 
            background-color: rgba(27, 27, 50, 0.85); 
            flex-direction: column;
            gap: 20px;
        }

        /* Adjusted styles for better readability and fit */
        .btn, .activities h1, .weekly-schedule h1, .personal-bests h1, .friends-activity h1 {
            color: white; /* Red highlights */
        }

        .btn {
            background: #000; /* Black background for buttons */
            border: 1px solid red; /* Red border for buttons */
        }

        /* Ensure images and overlay content fit well */
        .image-container, .overlay, .activity-container, .personal-bests-container {
            width: 100%;
            height: auto;
        }
                
                
        
        .logo {
          display: none;
        }
        
        .nav-item {
          position: relative;
          display: block;
        }
        
        .nav-item a {
          position: relative;
          display: flex;
          flex-direction: row;
          align-items: center;
          justify-content: center;
          color: #fff;
          font-size: 1rem;
          padding: 15px 0;
          margin-left: 10px;
          border-top-left-radius: 20px;
          border-bottom-left-radius: 20px;
        }
        
        .nav-item b:nth-child(1) {
          position: absolute;
          top: -15px;
          height: 15px;
          width: 100%;
          background: #fff;
          display: none;
        }
        
        .nav-item b:nth-child(1)::before {
          content: "";
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          border-bottom-right-radius: 20px;
          background: rgb(73, 57, 113);
        }
        
        .nav-item b:nth-child(2) {
          position: absolute;
          bottom: -15px;
          height: 15px;
          width: 100%;
          background: #fff;
          display: none;
        }
        
        .nav-item b:nth-child(2)::before {
          content: "";
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          border-top-right-radius: 20px;
          background: rgb(73, 57, 113);
        }
        
        .nav-item.active b:nth-child(1),
        .nav-item.active b:nth-child(2) {
          display: block;
        }
        
        .nav-item.active a {
          text-decoration: none;
          color: #000;
          background: rgb(254, 254, 254);
        }
        
        .nav-icon {
          width: 60px;
          height: 20px;
          font-size: 20px;
          text-align: center;
        }
        
        .nav-text {
          display: block;
          width: 120px;
          height: 20px;
        }
        
        /* CONTENT */
        
        .content {
          display: grid;
          grid-template-columns: 75% 25%;
        }
        
        /* LEFT CONTENT */
        
        .left-content {
          display: grid;
          grid-template-rows: 50% 50%;
         
          margin: 15px;
          padding: 20px;
          border-radius: 15px;
        }
        
        /* ACTIVITIES */
        
        .activities h1 {
          margin: 0 0 20px;
          font-size: 1.4rem;
          font-weight: 700;
        }
        
        .activity-container {
          display: grid;
          grid-template-columns: repeat(5, 1fr);
          grid-template-rows: repeat(2, 150px);
          column-gap: 10px;
        }
        
        .img-one {
          grid-area: 1 / 1 / 2 / 2;
        }
        
        .img-two {
          grid-area: 2 / 1 / 3 / 2;
        }
        
        .img-three {
          display: block;
          grid-area: 1 / 2 / 3 / 4;
        }
        
        .img-four {
          grid-area: 1 / 4 / 2 / 5;
        }
        
        .img-five {
          grid-area: 1 / 5 / 2 / 6;
        }
        
        .img-six {
          display: block;
          grid-area: 2 / 4 / 3 / 6;
        }
        
        .image-container {
          position: relative;
          margin-bottom: 10px;
          box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 3px;
          border-radius: 10px;
        }
        
        .image-container img {
          width: 100%;
          height: 100%;
          border-radius: 10px;
          object-fit: cover;
        }
        
        .overlay {
          position: absolute;
          display: flex;
          flex-direction: column;
          align-items: flex-end;
          justify-content: flex-end;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: linear-gradient(
            180deg,
            transparent,
            transparent,
            rgba(3, 3, 185, 0.5)
          );
          border-radius: 10px;
          transition: all 0.6s linear;
        }
        
        .image-container:hover .overlay {
          opacity: 0;
        }
        
        .overlay h3 {
          margin-bottom: 8px;
          margin-right: 10px;
          color: #fff;
        }
        
        /* LEFT BOTTOM */
        
        .left-bottom {
          display: grid;
          grid-template-columns: 55% 40%;
          gap: 40px;
        }
        
        /* WEEKLY SCHEDULE */
        
        .weekly-schedule {
          display: flex;
          flex-direction: column;
        }
        
        .weekly-schedule h1 {
          margin-top: 20px;
          font-size: 1.3rem;
          font-weight: 700;
        }
        
        .calendar {
          margin-top: 10px;
        }
        
        .day-and-activity {
          display: grid;
          grid-template-columns: 15% 60% 25%;
          align-items: center;
          border-radius: 14px;
          margin-bottom: 5px;
          color: #484d53;
          box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 3px;
        }
        
        .activity-one {
          background-color: rgb(124, 136, 224, 0.5);
          background-image: linear-gradient(
            240deg,
            rgb(124, 136, 224) 0%,
            #c3f4fc 100%
          );
        }
        
        .activity-two {
          background-color: #aee2a4a1;
          background-image: linear-gradient(240deg, #e5a243ab 0%, #f7f7aa 90%);
        }
        
        .activity-three {
          background-color: #ecfcc376;
          background-image: linear-gradient(240deg, #97e7d1 0%, #ecfcc3 100%);
        }
        
        .activity-four {
          background-color: #e6a7c3b5;
          background-image: linear-gradient(240deg, #fc8ebe 0%, #fce5c3 100%);
        }
        
        .day {
          display: flex;
          flex-direction: column;
          align-items: center;
          transform: translateY(-10px);
        }
        
        .day h1 {
          font-size: 1.6rem;
          font-weight: 600;
        }
        
        .day p {
          text-transform: uppercase;
          font-size: 0.9rem;
          font-weight: 600;
          transform: translateY(-3px);
        }
        
        .activity {
          border-left: 3px solid #484d53;
        }
        
        .participants {
          display: flex;
          margin-left: 20px;
        }
        
        .participants img {
          width: 28px;
          height: 28px;
          border-radius: 50%;
          z-index: calc(2 * var(--i));
          margin-left: -10px;
          box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 3px;
        }
        
        .activity h2 {
          margin-left: 10px;
          font-size: 1.25rem;
          font-weight: 600;
          border-radius: 12px;
        }
        
        .btn {
          display: block;
          padding: 8px 24px;
          margin: 10px auto;
          font-size: 1.1rem;
          font-weight: 500;
          outline: none;
          text-decoration: none;
          color: #484b57;
          background: rgba(255, 255, 255, 0.9);
          box-shadow: 0 6px 30px rgba(0, 0, 0, 0.1);
          border: 1px solid rgba(255, 255, 255, 0.3);
          border-radius: 25px;
          cursor: pointer;
        }
        
        .btn:hover,
        .btn:focus,
        .btn:active,
        .btn:visited {
          transition-timing-function: cubic-bezier(0.6, 4, 0.3, 0.8);
          animation: gelatine 0.5s 1;
        }
        
        @keyframes gelatine {
          0%,
          100% {
            transform: scale(1, 1);
          }
          25% {
            transform: scale(0.9, 1.1);
          }
          50% {
            transform: scale(1.1, 0.9);
          }
          75% {
            transform: scale(0.95, 1.05);
          }
        }
        
        /* PERSONAL BESTS */
        
        .personal-bests {
          display: block;
        }
        h1{
            color: #000;
        }
        .personal-bests h1 {
          margin-top: 20px;
          font-size: 1.3rem;
          font-weight: 700;
        }
        
        .personal-bests-container {
          display: grid;
          grid-template-columns: repeat(2, 1fr);
          grid-template-rows: repeat(2, 150px);
          gap: 10px;
          margin-top: 10px;
        }
        
        .best-item {
          display: flex;
          gap: 20px;
          width: 100%;
          height: 100%;
          border-radius: 15px;
          box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 3px;
        }
        
        .box-one {
          flex-direction: row;
          align-items: center;
          justify-content: center;
          grid-area: 1 / 1 / 2 / 3;
          background-color: rgba(185, 159, 237, 0.6);
          padding: 15px;
          font-size: 1rem;
          font-weight: 700;
        }
        
        .box-one img {
          max-width: 100px;
          aspect-ratio: 4/3;
        }
        
        .box-two {
          flex-direction: column;
          align-items: center;
          justify-content: flex-start;
          font-size: 0.9rem;
          font-weight: 700;
          padding: 10px;
          grid-area: 2 / 1 / 3 / 2;
          background-color: rgba(238, 184, 114, 0.6);
        }
        
        .box-two img {
          max-width: 90px;
          aspect-ratio: 3/2;
          align-self: flex-end;
        }
        
        .box-three {
          flex-direction: column;
          align-items: center;
          justify-content: flex-start;
          font-size: 0.9rem;
          font-weight: 700;
          padding: 10px;
          grid-area: 2 / 2 / 3 / 3;
          background-color: rgba(184, 224, 192, 0.6);
        }
        
        .box-three img {
          max-width: 70px;
          aspect-ratio: 1/1;
          align-self: flex-end;
        }
        
        /* RIGHT CONTENT */
        
        .right-content {
          display: grid;
          grid-template-rows: 5% 20% 75%;
          background: rgba(27, 27, 50, 0.85);
          margin: 15px 15px 15px 0;
          padding: 10px 0;
          border-radius: 15px;
        }
        
        /* USER INFO */
        
        .user-info {
          display: grid;
          grid-template-columns: 30% 55% 15%;
          align-items: center;
          padding: 0 10px;
        }
        
        .icon-container {
          display: flex;
          gap: 15px;
        }
        
        .user-info h4 {
          margin-left: 40px;
        }
        
        .user-info img {
          width: 40px;
          aspect-ratio: 1/1;
          border-radius: 50%;
        }
        
        /* ACTIVE CALORIES  */
        
        .active-calories {
          display: flex;
          flex-direction: column;
          align-items: center;
          background-color: rgb(214, 227, 248);
          padding: 0 10px;
          margin: 15px 10px 0;
          border-radius: 15px;
          box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 3px;
        }
        
        .active-calories h1 {
          margin-top: 10px;
          font-size: 1.2rem;
        }
        
        .active-calories-container {
          display: flex;
          flex-direction: row;
          align-items: center;
          gap: 10px;
        }
        
        .calories-content p {
          font-size: 1rem;
        }
        
        .calories-content p span {
          font-weight: 700;
        }
        
        .box {
          display: flex;
          justify-content: center;
          align-items: center;
          flex-direction: column;
          position: relative;
          padding: 10px 0;
          /* width: 200px; */
        }
        
        .box h2 {
          position: relative;
          text-align: center;
          font-size: 1.25rem;
          color: rgb(91, 95, 111);
          font-weight: 600;
        }
        
        .box h2 small {
          font-size: 0.8rem;
          font-weight: 600;
        }
        
        .circle {
          position: relative;
          width: 80px;
          aspect-ratio: 1/1;
          background: conic-gradient(
            from 0deg,
            #590b94 0%,
            #590b94 0% var(--i),
            #b3b2b2 var(--i),
            #b3b2b2 100%
          );
          border-radius: 50%;
          display: flex;
          justify-content: center;
          align-items: center;
        }
        
        .circle::before {
          content: "";
          position: absolute;
          inset: 10px;
          background-color: rgb(214, 227, 248);
          border-radius: 50%;
        }
        
        /* MOBILE PERSONAL BESTS  */
        
        .mobile-personal-bests {
          display: none;
        }
        
        /* FRIEND ACTIVITIES  */
        
        .friends-activity {
          display: flex;
          flex-direction: column;
        }
        
        .friends-activity h1 {
          font-size: 1.2rem;
          font-weight: 700;
          margin: 15px 0 10px 15px;
        }
        
        .card-container {
          display: flex;
          flex-direction: column;
          gap: 10px;
        }
        
        .card {
          background-color: #fff;
          margin: 0 10px;
          padding: 5px 7px;
          border-radius: 15px;
          box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 3px;
        }
        
        .card-two {
          display: block;
        }
        
        .card-user-info {
          display: flex;
          flex-direction: row;
          align-items: center;
          padding-bottom: 5px;
        }
        
        .card-user-info img {
          width: 25px;
          aspect-ratio: 1/1;
          border-radius: 50%;
          object-fit: cover;
        }
        
        .card-user-info h2 {
          font-size: 1rem;
          font-weight: 700;
          margin-left: 5px;
        }
        
        .card-img {
          display: block;
          width: 100%;
          aspect-ratio: 7/4;
          margin-bottom: 10px;
          object-fit: cover;
          border-radius: 10px;
          object-position: 50% 30%;
        }
        
        .card p {
          font-size: 0.9rem;
          padding: 0 5px 5px;
        }
        
        @media (max-width: 1500px) {
          main {
            grid-template-columns: 6% 94%;
          }
        
          
        
          .logo {
            display: block;
            width: 30px;
            margin: 20px auto;
          }
        
          .nav-text {
            display: none;
          }
        
          .content {
            grid-template-columns: 70% 30%;
          }
        }
        
        @media (max-width: 1310px) {
          main {
            grid-template-columns: 8% 92%;
            margin: 30px;
          }
        
          .content {
            grid-template-columns: 65% 35%;
          }
        
          .day-and-activity {
            margin-bottom: 10px;
          }
        
          .btn {
            padding: 8px 16px;
            margin: 10px 0;
            margin-right: 10px;
            font-size: 1rem;
          }
        
          .personal-bests-container {
            grid-template-rows: repeat(3, 98px);
            gap: 15px;
          }
        
          .box-one {
            flex-direction: row;
            justify-content: space-between;
            grid-area: 1 / 1 / 2 / 3;
            padding: 10px;
            font-size: 0.9rem;
          }
        
          .box-one img {
            max-width: 80px;
          }
        
          .box-two {
            flex-direction: row;
            justify-content: space-between;
            grid-area: 2 / 1 / 3 / 3;
          }
        
          .box-two img {
            max-width: 70px;
            align-self: center;
          }
        
          .box-three {
            flex-direction: row;
            justify-content: space-between;
            grid-area: 3 / 1 / 4 / 3;
          }
        
          .box-three img {
            max-width: 60px;
            align-self: center;
          }
            
            .right-content {
                grid-template-rows: 4% 20% 76%;
                margin: 15px 15px 15px 0;
            }
        }
        
        @media (max-width: 1150px) {
          .content {
            grid-template-columns: 60% 40%;
          }
        
          .left-content {
            grid-template-rows: 50% 50%;
            margin: 15px;
            padding: 20px;
          }
        
          .btn {
            padding: 8px 8px;
            font-size: 0.9rem;
          }
        
          .personal-bests-container {
                grid-template-rows: repeat(3, 70px);
            gap: 10px;
          }
        
          .activity-container {
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(2, 150px);
          }
        
          .img-one {
            grid-area: 1 / 1 / 2 / 2;
          }
        
          .img-two {
            grid-area: 2 / 1 / 3 / 2;
          }
        
          .img-three {
            display: none;
          }
        
          .img-four {
            grid-area: 1 / 2 / 2 / 3;
          }
        
          .img-five {
            grid-area: 1 / 3 / 2 / 4;
          }
        
          .img-six {
            grid-area: 2 / 2 / 3 / 4;
          }
        
          .left-bottom {
            grid-template-columns: 100%;
            gap: 0;
          }
        
          .right-content {
            grid-template-rows: 4% 19% 36% 41%;
          }
        
          .personal-bests {
            display: none;
          }
        
          .mobile-personal-bests {
            display: block;
            margin: 0 10px;
          }
        
          .mobile-personal-bests h1 {
            margin-top: 20px;
            font-size: 1.2rem;
          }
        
          .card-two {
            display: none;
          }
        
          .card-img {
            aspect-ratio: 16/9;
          }
        }
        
        @media (max-width: 1050px) {
             .right-content {
              grid-template-rows: 4% 19% 37% 40%;
          }
        }
        
        @media (max-width: 910px) {
          main {
            grid-template-columns: 10% 90%;
            margin: 20px;
          }
        
          .content {
            grid-template-columns: 55% 45%;
          }
        
          .left-content {
            grid-template-rows: 50% 50%;
            padding: 30px 20px 20px;
          }
        
          .activity-container {
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, 150px);
          }
        
          .img-one {
            grid-area: 1 / 1 / 2 / 2;
          }
        
          .img-two {
            grid-area: 2 / 1 / 3 / 2;
          }
        
          .img-three {
            display: none;
          }
        
          .img-four {
            grid-area: 1 / 2 / 2 / 3;
          }
        
          .img-five {
            grid-area: 2 / 2 / 3 / 3;
          }
        
          .img-six {
            display: none;
          }
        }
        
        @media (max-width: 800px) {
          .content {
            grid-template-columns: 52% 48%;
          }
        }
        
        @media (max-width: 700px) {
          main {
            grid-template-columns: 15% 85%;
          }
        
          .content {
    display: flex;
    flex-direction: row; /* Adjust if necessary to match your layout */
    justify-content: flex-start; /* Align children to the start of the container */
    padding: 20px;
    gap: 20px; /* Adds space between items */
}
        
          /* .left-content {
            grid-area: leftContent;
                grid-template-rows: 45% 55%;
            padding: 10px 20px 10px;
          } */
        
          .right-content {
            grid-area: rightContent;
                grid-template-rows: 5% 40% 50%;
            margin: 15px 15px 0 15px;
            padding: 10px 0 0;
            gap: 15px;
          }
        
          .activities,
          .weekly-schedule {
            margin-top: 10px;
          }
        
          .active-calories-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
          }
        
          .friends-activity {
            display: none;
          }
        }
     /* General styling for the event section */
/* General styling for the event section */
.event-section {
  font-family: 'Arial', sans-serif;
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

.section-title {
  text-align: center;
  color: #8B0000; /* Darker, blood red for section title */
  margin-bottom: 30px;
}

.event-cards-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
}

/* Styling for individual event cards with black to red gradient background */
.event-card {
  background-image: url("https://png.pngtree.com/background/20220718/original/pngtree-red-and-black-cool-abstract-sports-background-picture-image_1657984.jpg");
  background-size: cover;
  background-position: center;
  border-radius: 15px;
  box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  overflow: hidden;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  width: 100%;
  cursor: pointer;
  margin-bottom: 20px;
  position: relative; /* Needed for positioning the overlay */
  color: #FFFFFF; /* Sets a default text color for better readability */
}

.event-card::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.7); /* Starts darker */
  border-radius: 15px; /* Matches the card's border radius */
  transition: opacity 1.5s ease; /* Smooth transition for opacity */
  opacity: 1; /* Visible by default */
}

.event-card:hover::before {
  opacity: 0; /* Less visible on hover for a clearer effect */
}

.event-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 15px rgba(0,0,0,0.2);
}

.event-card-header,
.event-card-body {
  padding: 20px;
  position: relative; /* Ensures text is above the overlay */
  z-index: 1;
}

.event-title {
  font-size: 24px;
  margin-bottom: 10px;
  text-shadow: 2px 2px 4px rgba(0,0,0,0.5); /* Adds shadow for better readability */
  color: white;
}

.event-date {
  color: #FFD700; /* Gold for dates to make them stand out */
  font-size: 18px;
  margin-bottom: 20px;
  font-weight: bold; /* Adds emphasis */
}

.event-description {
  font-size: 16px; /* Adjusted for readability */
  margin-bottom: 15px;
  line-height: 1.5; /* Improves text flow and readability */
  color: white;
}

.event-type {
  font-weight: bold;
  background: #FF6347; /* Tomato red for a vibrant tag look */
  color: #FFFFFF;
  padding: 5px 10px;
  display: inline-block;
  border-radius: 5px; /* Rounded edges for the event type tag */
  box-shadow: 1px 1px 3px rgba(0,0,0,0.3); /* Subtle shadow for depth */
  text-transform: uppercase; /* Makes the event type stand out */
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 2; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
  border-radius: 10px; /* Optional: for rounded corners */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

       </style>
</header>
<body>  

@auth
    <!-- Content for authenticated users -->
    Welcome back, {{ Auth::user()->name }}!
@else
    <!-- Content for guests -->
    Please <a href="{{ route('login') }}">login</a> to see your dashboard.
@endauth

    <main>
   <section class="content">
        <div class="left-content">
          <div class="activities">
            <h1>Popular Activities</h1>
            <div class="activity-container">
              <div class="image-container img-one">
                <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/467cf682-03fb-4fae-b129-5d4f5db304dd" alt="tennis" />
                <div class="overlay">
                  <h3>Tennis</h3>
                </div>
              </div>

              <div class="image-container img-two">
                <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/3bab6a71-c842-4a50-9fed-b4ce650cb478" alt="hiking" />
                <div class="overlay">
                  <h3>Hiking</h3>
                </div>
              </div>

              <div class="image-container img-three">
                <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/c8e88356-8df5-4ac5-9e1f-5b9e99685021" alt="running" />
                <div class="overlay">
                  <h3>Running</h3>
                </div>
              </div>

              <div class="image-container img-four">
                <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/69437d08-f203-4905-8cf5-05411cc28c19" alt="cycling" />
                <div class="overlay">
                  <h3>Cycling</h3>
                </div>
              </div>

              <div class="image-container img-five">
                <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/e1a66078-1927-4828-b793-15c403d06411" alt="yoga" />
                <div class="overlay">
                  <h3>Yoga</h3>
                </div>
              </div>

              <div class="image-container img-six">
                <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/7568e0ff-edb5-43dd-bff5-aed405fc32d9" alt="swimming" />
                <div class="overlay">
                  <h3>Swimming</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="left-bottom">
            <div class="weekly-schedule">
              <h1>Weekly Schedule</h1>
              <div class="calendar">
                <div class="day-and-activity activity-one">
                  <div class="day">
                    <h1>13</h1>
                    <p>mon</p>
                  </div>
                  <div class="activity">
                    <h2>Swimming</h2>
                    <div class="participants">
                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/c61daa1c-5881-43f8-a50f-62be3d235daf" style="--i: 1" alt="" />
                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/90affa88-8da0-40c8-abe7-f77ea355a9de" style="--i: 2" alt="" />
                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/07d4fa6f-6559-4874-b912-3968fdfe4e5e" style="--i: 3" alt="" />
                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/e082b965-bb88-4192-bce6-0eb8b0bf8e68" style="--i: 4" alt="" />
                    </div>
                  </div>
                  <button class="btn">Join</button>
                </div>

                <div class="day-and-activity activity-two">
                  <div class="day">
                    <h1>15</h1>
                    <p>wed</p>
                  </div>
                  <div class="activity">
                    <h2>Yoga</h2>
                    <div class="participants">
                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/c61daa1c-5881-43f8-a50f-62be3d235daf" style="--i: 1" alt="" />
                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/32037044-f076-433a-8a6e-9b80842f29c9" style="--i: 2" alt="" />
                    </div>
                  </div>
                  <button class="btn">Join</button>
                </div>

                <div class="day-and-activity activity-three">
                  <div class="day">
                    <h1>17</h1>
                    <p>fri</p>
                  </div>
                  <div class="activity">
                    <h2>Tennis</h2>
                    <div class="participants">
                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/32037044-f076-433a-8a6e-9b80842f29c9" style="--i: 1" alt="" />
                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/e082b965-bb88-4192-bce6-0eb8b0bf8e68" style="--i: 2" alt="" />
                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/c61daa1c-5881-43f8-a50f-62be3d235daf" style="--i: 3" alt="" />
                    </div>
                  </div>
                  <button class="btn">Join</button>
                </div>

                <div class="day-and-activity activity-four">
                  <div class="day">
                    <h1>18</h1>
                    <p>sat</p>
                  </div>
                  <div class="activity">
                    <h2>Hiking</h2>
                    <div class="participants">
                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/07d4fa6f-6559-4874-b912-3968fdfe4e5e" style="--i: 1" alt="" />
                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/32037044-f076-433a-8a6e-9b80842f29c9" style="--i: 2" alt="" />
                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/07d4fa6f-6559-4874-b912-3968fdfe4e5e" alt="" />
                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/c61daa1c-5881-43f8-a50f-62be3d235daf" style="--i: 4" alt="" />
                      <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/90affa88-8da0-40c8-abe7-f77ea355a9de" style="--i: 5" alt="" />
                    </div>
                  </div>
                  <button class="btn">Join</button>
                </div>
              </div>
            </div>

            <div class="personal-bests">
              <h1>Personal Bests</h1>
              <div class="personal-bests-container">
                <div class="best-item box-one">
                  <p>Fastest 5K Run: 22min</p>
                  <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/242bbd8c-aaf8-4aee-a3e4-e0df62d1ab27" alt="" />
                </div>
                <div class="best-item box-two">
                  <p>Longest Distance Cycling: 4 miles</p>
                  <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/a3b3cb3a-5127-498b-91cc-a1d39499164a" alt="" />
                </div>
                <div class="best-item box-three">
                  <p>Longest Roller-Skating: 2 hours</p>
                  <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/e0ee8ffb-faa8-462a-b44d-0a18c1d9604c" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="right-content">
         

          

          <div class="mobile-personal-bests">
            <h1>Personal Bests</h1>
            <div class="personal-bests-container">
              <div class="best-item box-one">
                <p>Fastest 5K Run: 22min</p>
                <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/05dfc444-9ed3-44cc-96af-a9cf195f5820" alt="" />
              </div>
              <div class="best-item box-two">
                <p>Longest Distance Cycling: 4 miles</p>
                <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/9ca170e9-1252-4fa6-8677-36493540c1f2" alt="" />
              </div>
              <div class="best-item box-three">
                <p>Longest Roller-Skating: 2 hours</p>
                <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/262d1611-ed4c-4297-981c-480cf7f95714" alt="" />
              </div>
            </div>
          </div>

          <div class="friends-activity">
            <!-- <h1>Friends Activity</h1>
            <div class="card-container">

              <div class="card">
                <div class="card-user-info">
                  <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/9290037d-a5b2-4f50-aea3-9f3f2b53b441" alt="" />
                  <h2>Jane</h2>
                </div>
                <img class="card-img" src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/bef54506-ea45-4e42-a1b6-23a48f61c5e8" alt="" />
                <p>We completed the 30-Day Running Streak Challenge!🏃‍♀️🎉</p>
              </div>

              
            </div> -->

            <div class="event-section">
            <h1 class="section-title">Upcoming Events</h1>
            <div class="event-cards-container">
                @foreach($events->sortByDesc('start_date')->take(-2) as $event)
                <div class="event-card">
                    <div class="event-card-header">
                        <h2 class="event-title">{{ $event->title }}</h2>
                        <p class="event-date">{{ \Carbon\Carbon::parse($event->start_date)->format('M d, Y') }} - {{ \Carbon\Carbon::parse($event->end_date)->format('M d, Y') }}</p>
                    </div>
                    <div class="event-card-body">
                        <p class="event-description">{{ $event->description }}</p>
                        <p class="event-type">Type: {{ $event->type }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


          </div>
        </div>
      </section>
    </main>
<!-- The Modal -->
<div id="eventModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2 id="modalEventTitle">Event Title</h2>
    <p id="modalEventDate">Date: Event Date</p>
    <p id="modalEventDescription">Description: This is a more detailed description of the event.</p>
  </div>
</div>


    <script>
   const navItems = document.querySelectorAll(".nav-item");

navItems.forEach((navItem, i) => {
  navItem.addEventListener("click", () => {
    navItems.forEach((item, j) => {
      item.className = "nav-item";
    });
    navItem.className = "nav-item active";
  });
});

// Get the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Loop through each event card to add the click event
document.querySelectorAll('.event-card').forEach(item => {
  item.addEventListener('click', function() {
    modal.style.display = "block";
    // Optional: Update modal content based on the clicked card
  });
});

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}



    </script>
    </body>
    </html>
    @endsection