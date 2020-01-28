import classnames from 'classnames';

const {
    Icon,
    Button,
    ButtonGroup
} = wp.components;

const SortableArrows = function (props) {
    return props.isActive && (
        <ButtonGroup className={classnames('sortable-arrows')}>
            <Button className={classnames('arrow-btn')}
                    isSmall
                    disabled={props.itemKey === 0}
                    onClick={(e) => props.left(e, props.itemKey)}>
                <Icon icon="arrow-left-alt2"
                      label="Move Left"
                      size={14}
                      className={classnames('arrow-icon')}>
                </Icon>
            </Button>
            <Button className={classnames('arrow-btn')}
                    isSmall
                    disabled={props.itemKey === props.length - 1}
                    onClick={(e) => props.right(e, props.itemKey)}>
                <Icon icon="arrow-right-alt2"
                      label="Move Right"
                      size={14}
                      className={classnames('arrow-icon')}>
                </Icon>
            </Button>
        </ButtonGroup>
    );
};

export default SortableArrows;