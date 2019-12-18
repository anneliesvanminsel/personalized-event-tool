import React from 'react';

const RightArrow = (props) => {
    return (
        <div className="slideshow__nextArrow slideshow__arrow" onClick={props.goToNextSlide}>
            Next
        </div>
    );
};

export default RightArrow;