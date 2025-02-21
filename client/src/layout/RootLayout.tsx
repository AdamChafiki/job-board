import { Outlet } from "react-router-dom";
import Navbar from "../components/shared/Navbar";

function RootLayout() {
  return (
    <main>
      <Navbar />
      <Outlet />  
    </main>
  );
}

export default RootLayout;
