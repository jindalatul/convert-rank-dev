
import React from "react";
import { Link } from 'react-router-dom';

//import { LeftSidebarToggleButton, LeftSidebarSlideInOut } from "./LeftSidebarSlideInOut.js";

function TopNav() 
{
  //const showLeftSidebar= false;
  //const [isLeftSidebarVisible, setIsLeftSidebarVisible]= useState(false);

 /*
  const handleToggleLeftSidebar = () => {
    //console.log("✅ Button clicked in Child — toggling state");
    //alert(1);
    setIsLeftSidebarVisible(v => !v);
  };
*/
  return (
  <>
      <header className="topbar">
          <div className="badge">CR</div>
          <div className="brand">Content Builder</div>
            <nav className="nav">
              <Link to="/projects">Projects</Link>
              <a href={'logout.php'}>Logout</a>
            </nav>
      </header>
  </>
  );
}

export default TopNav;
