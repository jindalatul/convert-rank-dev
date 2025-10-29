import React from 'react';

export function LeftSidebarSlideInOut({ isVisible }) 
{
  return (
            <div className="sidenav" 
                 style={{
                    width: isVisible ? "140px" : "0px",
                    overflow: "hidden",
                    transition: "width 0.3s ease",
                    border: "0px solid gray",
                }}>
                {/* This needs re-design */}
                <a href="./projects.html" style={{paddingTop:"40px"}}>Projects</a>
                <a href="./Analytics.html" style={{paddingTop:"30px"}}>Analytics</a>
            </div>
    );
}

export function LeftSidebarToggleButton({ onButtonClick })
{
    /*
    const handleTopMenuClick = ()=>{
        alert(1);
    }
    */
    return(
    <>
       { /*<button onClick={onButtonClick}>Menu</button>*/ }
        <div className="hamburger-container" 
             onClick={onButtonClick}>
                <div className="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
         </div>
    </>);
}
