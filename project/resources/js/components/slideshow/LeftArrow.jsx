import React from 'react';

const LeftArrow = (props) => {
    return (
        <div className="slideshow__backArrow slideshow__arrow" onClick={props.goToPrevSlide}>
            Back
        </div>
    );
};

export default LeftArrow;