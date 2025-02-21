import { Link } from "react-router-dom";

function Navbar() {
  return (
    <header>
      <ul>
        <Link to="/">Home</Link>
        <Link to="/job">Job</Link>
      </ul>
    </header>
  );
}

export default Navbar;
