import React from 'react';

const LeftArrow = (props) => {
    return (
        <div className="backArrow" onClick={props.goToPrevSlide}>
            TERUG
        </div>
    );
};

export default LeftArrow;