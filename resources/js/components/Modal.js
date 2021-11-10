// import './Modal.css';

const Modal = ({
          handleClose, show, children
}) => {
          const showHideClassName = show ? "modal display-block" : "modal display-none";

return (
          <div className={showHideClassName}>
      <section className="modal-main">
        {children}
        <button type="button" onClick={handleClose} id = "modal-button">
          Close
        </button>
      </section>
      <br />
      <br />
    </div>
);


}

export default Modal;